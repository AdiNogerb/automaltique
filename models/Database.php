<?php 
class DataBase {
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