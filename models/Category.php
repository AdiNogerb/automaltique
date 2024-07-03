<?php

/**
 * Classe Category
 *
 * Cette classe représente une catégorie et fournit des méthodes pour interagir avec la table des catégories dans la base de données.
 */
class Category extends BaseModel
{
    use AccessorTrait;
    protected int $id_category = 0;

    /**
     * Constructeur de la classe Category.
     *
     * Initialise une nouvelle instance de la classe Category avec les valeurs spécifiées pour l'ID de la catégorie et le nom.
     * Appelle le constructeur de la classe parente pour initialiser la connexion à la base de données.
     *
     * @param integer $id_category L'identifiant de la catégorie (par défaut 0).
     * @param string $name Le nom de la catégorie (par défaut une chaîne vide).
     */
    public function __construct(protected string $name = '')
    {
        parent::__construct();
    }

    /**
     * Récupère toutes les catégories.
     *
     * Cette méthode récupère toutes les catégories de la table `categories` et les retourne sous forme de tableau.
     *
     * @return array Un tableau d'objets représentant les catégories.
     * @throws Exception Si une erreur survient lors de la récupération des catégories.
     */
    public function getAll(): array
    {
        try {
            $sql = 'SELECT * FROM `categories` ORDER BY `name`;';
            $stmt = $this->db->query($sql);
            $categoryList = $stmt->fetchAll();
            return $categoryList;
        } catch (Exception) {
            throw new Exception('Méthode getAll de la classe Category défectueuse');
        }
    }

    /**
     * Insère une nouvelle catégorie.
     *
     * Cette méthode insère une nouvelle catégorie dans la table `categories` avec le nom spécifié.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de l'insertion de la catégorie.
     */
    public function insert(): void
    {
        try {
            $sql = 'INSERT INTO `categories` (`name`) VALUES (:categoryName);';
            $stmt = $this->db->prepare($sql); 
            $stmt->bindValue(':categoryName', $this->name, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode insert de la classe Category défectueuse');
        }
    }

    /**
     * Met à jour une catégorie existante.
     *
     * Cette méthode met à jour le nom de la catégorie spécifiée par l'ID de la catégorie.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de la mise à jour de la catégorie.
     */
    public function update(): void
    {
        try {
            $sql = 'UPDATE `categories` SET `name` = :categoryName WHERE `categories`.`id_category` = :id_category;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':categoryName', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode update de la classe Category défectueuse');
        }
    }

    /**
     * Supprime une catégorie existante.
     *
     * Cette méthode supprime la catégorie spécifiée par l'ID de la catégorie de la table `categories`.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de la suppression de la catégorie.
     */
    public function delete(): void
    {
        try {
            $sql = 'DELETE FROM `categories` WHERE `categories`.`id_category` = :id_category ;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode delete de la classe Category défectueuse');
        }
    }
}
