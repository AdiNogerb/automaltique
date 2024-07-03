<?php

/**
 * Contrôleur de la vue du menu.
 *
 * Ce contrôleur étend la classe Controller et fournit une méthode pour rendre la vue du menu.
 */
class MenuCtrl extends Controller
{
    /**
     * Constructeur de la classe MenuCtrl.
     *
     * Initialise une nouvelle instance de la classe MenuCtrl.
     */
    public function __construct()
    {
    }

    /**
     * Rend la vue du menu.
     *
     * Cette méthode récupère toutes les catégories et tous les produits en utilisant les méthodes héritées de la classe parente Controller,
     * puis rend la vue du menu en passant les catégories et les produits à la vue.
     *
     * @return void
     * @throws Exception Si une erreur survient lors de la récupération des catégories ou des produits.
     */
    public function renderView(): void
    {
        try {
            $pageScript = 'menu';
            $categories = $this->listCategories();
            $products = $this->listProducts();

            require_once __DIR__ . '/../views/menu.php';
            require_once __DIR__ . '/../views/templates/template.php';
        } catch (Exception $e) {
            throw new Exception('Erreur lors du rendu de la vue du menu: ' . $e->getMessage());
        }
    }
}
