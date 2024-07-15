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
    
    /**
     * Affiche la liste des produits et des catégories dans le tableau de bord.
     *
     * Cette méthode vérifie d'abord la connexion de l'utilisateur, puis récupère et affiche les catégories et les produits.
     *
     * @return void
     */
    public function read(): void
    {
        $this->checkConnexion();

        $pageScript = 'dash_products';
        $year = $this->year();
        $categories = $this->listCategories();
        $products = $this->listProducts();

        require_once __DIR__.'/../../views/dashboard/products/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Affiche le formulaire pour ajouter un produit dans une catégorie.
     *
     * Cette méthode vérifie d'abord la connexion de l'utilisateur, puis récupère les catégories et les produits.
     * Elle traite les données soumises via le formulaire pour ajouter un nouveau produit dans une catégorie spécifique.
     *
     * @return void
     */
    public function create(): void
    {
        $this->checkConnexion();
        $year = $this->year();
        $categories = $this->listCategories();
        $isOk = false;
        
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
        $validDescription = null;
        $validPrice = null;
        $validPint = null;
        $validHappy = null;
        $validBottle = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['product-name'])) {
                $sanitizeName = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_SPECIAL_CHARS);
                $validName = filter_var($sanitizeName, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=> REGEX_PRODUCT_NAME)));
                if ($validName) {
                    if (!empty($_POST['product-description'])) {
                        $sanitizeDescription = filter_input(INPUT_POST, 'product-description', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validDescription = filter_var($sanitizeDescription, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRODUCT_DESCRIPTION)));
                        if (!$validDescription) {
                            $validDescription = null;
                        }
                    }
                    if (!empty($_POST['product-price'])) {
                        $sanitizePrice = filter_input(INPUT_POST, 'product-price', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validPrice = filter_var($sanitizePrice, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validPrice) {
                            $validPrice = str_replace(',', '.', $validPrice);
                        } else {
                            $validPrice = null;
                        }
                    }
                    if (!empty($_POST['product-pint'])) {
                        $sanitizePint = filter_input(INPUT_POST, 'product-pint', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validPint = filter_var($sanitizePint, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validPint) {
                            $validPint = str_replace(',', '.', $validPint);
                        } else {
                            $validPint = null;
                        }
                    }
                    if (!empty($_POST['product-happy'])) {
                        $sanitizeHappy = filter_input(INPUT_POST, 'product-happy', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validHappy = filter_var($sanitizeHappy, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validHappy) {
                            $validHappy = str_replace(',', '.', $validHappy);
                        } else {
                            $validHappy = null;
                        }
                    }
                    if (!empty($_POST['product-bottle'])) {
                        $sanitizeBottle = filter_input(INPUT_POST, 'product-bottle', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validBottle = filter_var($sanitizeBottle, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validBottle) {
                            $validBottle = str_replace(',', '.', $validBottle);
                        } else {
                            $validBottle = null;
                        }
                    }
                    $product = new Product($id, $validName, $validDescription, $validPrice, $validPint, $validHappy, $validBottle);
                    $product->insert();
                    header('Location: /index.php?page=dashboard/products');
                    die;
                } else {
                    $errorBack = 'Les champs remplis ne sont pas valides';
                }
            } else {
                $errorBack = 'Erreur lors de l\'envoi des champs du produit';
            }
        }

        require_once __DIR__.'/../../views/dashboard/products/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Met à jour un produit existant.
     *
     * Cette méthode vérifie d'abord la connexion de l'utilisateur, puis récupère les catégories et les produits.
     * Elle affiche le formulaire pour mettre à jour un produit sélectionné dans une catégorie spécifique.
     * Si le formulaire est soumis, les données sont validées et le produit est mis à jour dans la base de données.
     *
     * @return void
     */
    public function update(): void
    {
        $this->checkConnexion();
        $year = $this->year();
        $categories = $this->listCategories();
        $products = $this->listProducts();
        $isOk = false;

        if (!empty($_GET['id']) && !empty($_GET['product'])) {
            foreach ($categories as $category) {
                if ($category->id_category == $_GET['id']) {
                    $id = $category->id_category;
                    $name = $category->name;
                    foreach ($products as $product) {
                        if ($product->id_product == $_GET['product']) {
                            $productSelected = $product;
                            $isOk = true;
                        }
                    }
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
        
        $title = 'Mettre à jour '.$productSelected->name.' dans la catégorie '.$name;
        $pageScript = 'add_product';
        $validName = $productSelected->name;
        $validDescription = $productSelected->description;
        $validPrice = $productSelected->price;
        $validPint = $productSelected->price_pint;
        $validHappy = $productSelected->price_happy;
        $validBottle = $productSelected->price_bottle;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['product-name'])) {
                $sanitizeName = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_SPECIAL_CHARS);
                $validName = filter_var($sanitizeName, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=> REGEX_PRODUCT_NAME)));
                if ($validName) {
                    if (!empty($_POST['product-description'])) {
                        $sanitizeDescription = filter_input(INPUT_POST, 'product-description', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validDescription = filter_var($sanitizeDescription, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRODUCT_DESCRIPTION)));
                        if (!$validDescription) {
                            $validDescription = null;
                        }
                    } else {
                        $validDescription = null;
                    }
                    if (!empty($_POST['product-price'])) {
                        $sanitizePrice = filter_input(INPUT_POST, 'product-price', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validPrice = filter_var($sanitizePrice, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validPrice) {
                            $validPrice = str_replace(',', '.', $validPrice);
                        } else {
                            $validPrice = null;
                        }
                    } else {
                        $validPrice = null;
                    }
                    if (!empty($_POST['product-pint'])) {
                        $sanitizePint = filter_input(INPUT_POST, 'product-pint', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validPint = filter_var($sanitizePint, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validPint) {
                            $validPint = str_replace(',', '.', $validPint);
                        } else {
                            $validPint = null;
                        }
                    } else {
                        $validPint = null;
                    }
                    if (!empty($_POST['product-happy'])) {
                        $sanitizeHappy = filter_input(INPUT_POST, 'product-happy', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validHappy = filter_var($sanitizeHappy, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validHappy) {
                            $validHappy = str_replace(',', '.', $validHappy);
                        } else {
                            $validHappy = null;
                        }
                    } else {
                        $validHappy = null;
                    }
                    if (!empty($_POST['product-bottle'])) {
                        $sanitizeBottle = filter_input(INPUT_POST, 'product-bottle', FILTER_SANITIZE_SPECIAL_CHARS);
                        $validBottle = filter_var($sanitizeBottle, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRICE)));
                        if ($validBottle) {
                            $validBottle = str_replace(',', '.', $validBottle);
                        } else {
                            $validBottle = null;
                        }
                    } else {
                        $validBottle = null;
                    }
                    $product = new Product($id, $validName, $validDescription, $validPrice, $validPint, $validHappy, $validBottle);
                    $product->id_product = $productSelected->id_product;
                    $product->update();
                    header('Location: /index.php?page=dashboard/products');
                    die;
                } else {
                    $errorBack = 'Les champs remplis ne sont pas valides';
                }
            } else {
                $errorBack = 'Erreur lors de l\'envoi des champs du produit';
            }
        }

        require_once __DIR__.'/../../views/dashboard/products/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Supprime un produit existant.
     *
     * Cette méthode vérifie d'abord la connexion de l'utilisateur, puis récupère les catégories et les produits.
     * Elle affiche un formulaire de confirmation pour supprimer un produit sélectionné dans une catégorie spécifique.
     * Si la suppression est confirmée, le produit est supprimé de la base de données.
     *
     * @return void
     */
    public function delete(): void
    {
        $this->checkConnexion();
        $year = $this->year();
        $categories = $this->listCategories();
        $products = $this->listProducts();
        $isOk = false;
        $disabled = true;

        if (!empty($_GET['id']) && !empty($_GET['product'])) {
            foreach ($categories as $category) {
                if ($category->id_category == $_GET['id']) {
                    $id = $category->id_category;
                    $name = $category->name;
                    foreach ($products as $product) {
                        if ($product->id_product == $_GET['product']) {
                            $productSelected = $product;
                            $isOk = true;
                        }
                    }
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
        
        $title = 'Supprimer '.$productSelected->name.' dans la catégorie '.$name. ' ?';
        $pageScript = 'add_product';
        $validName = $productSelected->name;
        $validDescription = $productSelected->description;
        $validPrice = $productSelected->price;
        $validPint = $productSelected->price_pint;
        $validHappy = $productSelected->price_happy;
        $validBottle = $productSelected->price_bottle;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product->id_product = $productSelected->id_product;
            $product->delete();
            header('Location: /index.php?page=dashboard/products');
            die;
        }

        require_once __DIR__.'/../../views/dashboard/products/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}