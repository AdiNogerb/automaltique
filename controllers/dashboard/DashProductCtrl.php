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

    public function create(): void
    {
        $this->checkConnexion();
        $categories = $this->listCategories();
        $products = $this->listProducts();
        $id = '';
        $name = '';
        $isOk = false;
        $errorName = '';
        $errorDescription = '';
        $errorPrice = '';
        $errorPint = '';
        $errorHappy = '';
        $errorBottle = '';
        $requiredField = true;
        
        if (!empty($_GET['id'])) {
            foreach ($categories as $category) {
                if ($category->id_category == $_GET['id']) {
                    $id = $category->id_category;
                    $name = $category->name;
                    $isOk = true;
                }
            }
            if (!$isOk) {
                header(('Location: index.php?page=dashboard/products'));
                die;
            }
        } else {
            header(('Location: index.php?page=dashboard/products'));
            die;
        }
        
        $title = 'Ajouter un produit dans la catégorie '.$name;
        $pageScript = 'add_product';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        require_once __DIR__.'/../../views/dashboard/products/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}