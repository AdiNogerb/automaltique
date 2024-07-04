<?php

class DashProductCtrl extends Controller
{
    /**
     * Constructeur de la classe DashProductCtrl.
     *
     * Initialise une nouvelle instance de la classe DashProductCtrl.
     */
    public function __construct()
    {
    }
    
    public function read(): void
    {
        $this->checkConnexion();

        $pageScript = 'dash_products';
        $categories = $this->listCategories();
        $products = $this->listProducts();

        require_once __DIR__.'/../../views/dashboard/products/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}