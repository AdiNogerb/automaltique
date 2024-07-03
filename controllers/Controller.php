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
}