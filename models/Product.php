<?php

/**
 * Classe Product
 *
 * Cette classe représente un produit et fournit des méthodes pour interagir avec la table des produits dans la base de données.
 */
class Product extends BaseModel
{
    use AccessorTrait;

    /**
     * Constructeur de la classe Product.
     *
     * Initialise une nouvelle instance de la classe Product avec les valeurs spécifiées pour l'ID du produit, l'ID de la catégorie, le nom, la description, le prix, le prix à la pinte et le prix en happy hour.
     * Appelle le constructeur de la classe parente pour initialiser la connexion à la base de données.
     *
     * @param int $id_product L'identifiant du produit (par défaut 0).
     * @param int $id_category L'identifiant de la catégorie associée au produit (par défaut 0).
     * @param string $name Le nom du produit (par défaut une chaîne vide).
     * @param string $description La description du produit (par défaut une chaîne vide).
     * @param string $price Le prix du produit (par défaut une chaîne vide).
     * @param string $price_pint Le prix du produit à la pinte (par défaut une chaîne vide).
     * @param string $price_happy Le prix du produit en happy hour (par défaut une chaîne vide).
     */
    public function __construct(
        protected int $id_product = 0, 
        protected int $id_category = 0, 
        protected string $name = '', 
        protected string $description = '',
        protected string $price = '',
        protected string $price_pint = '',
        protected string $price_happy = '')
    {
        parent::__construct();
    }

    /**
     * Récupère tous les produits.
     *
     * Cette méthode récupère tous les produits de la table `products` et les retourne sous forme de tableau.
     *
     * @return array Un tableau d'objets représentant les produits.
     * @throws Exception Si une erreur survient lors de la récupération des produits.
     */
    public function getAll(): array
    {
        try {
            $sql = 'SELECT * FROM `products` ORDER BY `name`;';
            $stmt = $this->db->query($sql);
            $productList = $stmt->fetchAll();
            return $productList;
        } catch (Exception) {
            throw new Exception('Méthode getAll de la classe Product défectueuse');
        }
    }

    /**
     * Insère un nouveau produit.
     *
     * Cette méthode insère un nouveau produit dans la table `products` avec les propriétés spécifiées.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de l'insertion du produit.
     */
    public function insert(): void
    {
        try {
            $sql = 'INSERT INTO `products` (`id_category`, `name`, `description`, `price`, `price_pint`, `price_happy`) 
                    VALUES (:id_category, :name, :description, :price, :price_pint, :price_happy);';
            $stmt = $this->db->prepare($sql); 
            $stmt->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':price_pint', $this->price_pint, PDO::PARAM_STR);
            $stmt->bindValue(':price_happy', $this->price_happy, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode insert de la classe Product défectueuse');
        }
    }

    /**
     * Met à jour un produit existant.
     *
     * Cette méthode met à jour les propriétés du produit spécifié par l'ID du produit.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de la mise à jour du produit.
     */
    public function update(): void
    {
        try {
            $sql = 'UPDATE `products` SET `id_category` = :id_category, `name` = :name, `description` = :description, 
                    `price` = :price, `price_pint` = :price_pint, `price_happy` = :price_happy 
                    WHERE `products`.`id_product` = :id_product;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_category', $this->id_category, PDO::PARAM_INT);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':price_pint', $this->price_pint, PDO::PARAM_STR);
            $stmt->bindValue(':price_happy', $this->price_happy, PDO::PARAM_STR);
            $stmt->bindValue(':id_product', $this->id_product, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode update de la classe Product défectueuse');
        }
    }

    /**
     * Supprime un produit existant.
     *
     * Cette méthode supprime le produit spécifié par l'ID du produit de la table `products`.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de la suppression du produit.
     */
    public function delete(): void
    {
        try {
            $sql = 'DELETE FROM `products` WHERE `products`.`id_product` = :id_product;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_product', $this->id_product, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode delete de la classe Product défectueuse');
        }
    }
}
