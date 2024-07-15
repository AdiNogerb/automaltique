<?php

/**
 * Contrôleur de l'application.
 *
 * Ce contrôleur fournit des méthodes pour gérer les actions liées aux catégories et aux produits.
 */
class Controller
{
    /**
     * Liste toutes les catégories.
     *
     * Cette méthode utilise le modèle Category pour récupérer toutes les catégories depuis la base de données.
     *
     * @return array Un tableau d'objets représentant les catégories.
     * @throws Exception Si une erreur survient lors de la récupération des catégories.
     */
    public function listCategories(): array
    {
        try {
            $categoryModel = new Category();
            return $categoryModel->getAll();
        } catch (Exception $e) {
            throw new Exception('Erreur lors de la récupération des catégories: ' . $e->getMessage());
        }
    }

    /**
     * Liste tous les produits.
     *
     * Cette méthode utilise le modèle Product pour récupérer tous les produits depuis la base de données.
     *
     * @return array Un tableau d'objets représentant les produits.
     * @throws Exception Si une erreur survient lors de la récupération des produits.
     */
    public function listProducts(): array
    {
        try {
            $productModel = new Product();
            return $productModel->getAll();
        } catch (Exception $e) {
            throw new Exception('Erreur lors de la récupération des produits: ' . $e->getMessage());
        }
    }

    /**
     * Liste tous les articles.
     *
     * Cette méthode utilise le modèle Article pour récupérer tous les articles depuis la base de données.
     *
     * @return array Un tableau d'objets représentant les articles.
     * @throws Exception Si une erreur survient lors de la récupération des articles.
     */
    public function listArticles(): array
    {
        try {
            $articleModel = new Article();
            return $articleModel->getAll();
        } catch (Exception $e) {
            throw new Exception('Erreur lors de la récupération des produits: ' . $e->getMessage());
        }
    }

    public function listSchedules(): array
    {
        try {
            $scheduleModel = new Schedule();
            return $scheduleModel->getAll();
        } catch (Exception $e) {
            throw new Exception('Erreur lors de la récupération des produits: ' . $e->getMessage());
        }
    }

    /**
     * Adapte une chaîne de caractères pour l'utilisation dans une expression régulière.
     *
     * Cette méthode prend une chaîne de caractères en entrée et retourne une nouvelle chaîne
     * après avoir supprimé les deux premiers et les deux derniers caractères.
     *
     * @param string $string La chaîne de caractères à adapter.
     * @return string La chaîne de caractères adaptée.
     */
    public function adaptRegex(string $string): string
    {
        return substr($string, 2, -2);
    }

    /**
     * Vérifie la connexion de l'utilisateur.
     *
     * Cette méthode vérifie si un cookie nommé 'Admin' est défini. Si ce n'est pas le cas,
     * l'utilisateur est redirigé vers la page d'accueil.
     *
     * @return void
     */
    public function checkConnexion(): void
    {
        if (!isset($_COOKIE['Admin'])) {
            header(('Location: index.php?page=home'));
            die;
        }
    }

    public function year(): string
    {
        $date = new DateTime();
        return $date->format('Y');
    }
}