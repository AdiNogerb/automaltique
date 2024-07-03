<?php

/**
 * Classe BaseModel
 *
 * Classe de base pour les modèles, gérant la connexion à la base de données et utilisant un trait pour l'accès aux propriétés.
 */
class BaseModel {
    use AccessorTrait;
    
    /**
     * @var \PDO Instance de la classe PDO pour la connexion à la base de données.
     */
    protected \PDO $db;

    /**
     * Constructeur de la classe BaseModel.
     *
     * Initialise la connexion à la base de données en utilisant la méthode dbConnect() de la classe Database.
     */
    public function __construct()
    {
        $this->db = Database::dbConnect();
    }
}
