<?php 
/**
 * Classe DataBase pour gérer la connexion à la base de données.
 */
class DataBase {
    /**
     * Établit une connexion à la base de données en utilisant PDO.
     *
     * Cette méthode configure et retourne une instance de PDO pour se connecter à la base de données.
     * En cas d'échec de la connexion, une exception PDO est capturée et un message d'erreur est affiché.
     *
     * @return \PDO Une instance de la classe PDO configurée pour la connexion à la base de données.
     *
     * @throws \PDOException Si la connexion à la base de données échoue.
     */
    public static function dbConnect():\PDO 
    {
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ];
        try {
            $pdo = new \PDO(DSN, LOGIN, PASSWORD, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }
}