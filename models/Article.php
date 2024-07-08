<?php

class Article extends BaseModel
{
    use AccessorTrait;
    protected int $id_article;

    public function __construct(protected string $title = '', protected string $content = '', protected string $picture = '')
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        try {
            $sql = 'SELECT * FROM `articles`;';
            $stmt = $this->db->query($sql);
            $articlesList = $stmt->fetchAll();
            return $articlesList;
        } catch (Exception) {
            throw new Exception('Méthode getAll de la classe Article défectueuse');
        }
    }

    public function insert(): void
    {
        try {
            $sql = 'INSERT INTO `articles` (`title`, `content`, `picture`) 
                    VALUES (:title, :content, :picture);';
            $stmt = $this->db->prepare($sql); 
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
            $stmt->bindValue(':picture', $this->picture, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            throw new Exception('Méthode insert de la classe Article défectueuse '.$e);
        }
    }

    public function update(): void
    {
        try {
            $sql = 'UPDATE `articles` SET `id_article` = :id_article, `title` = :title, `content` = :content, `picture` = :picture
                    WHERE `articles`.`id_article` = :id_article;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_article', $this->id_article, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
            $stmt->bindValue(':picture', $this->picture, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode update de la classe Article défectueuse');
        }
    }

    public function delete(): void
    {
        try {
            $sql = 'DELETE FROM `articles` WHERE `articles`.`id_article` = :id_article;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_article', $this->id_article, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode delete de la classe Article défectueuse');
        }
    }
}