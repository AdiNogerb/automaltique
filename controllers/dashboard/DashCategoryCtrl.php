<?php

class DashCategoryCtrl extends Controller
{
    /**
     * Constructeur de la classe DashCategoryCtrl.
     *
     * Initialise une nouvelle instance de la classe DashCategoryCtrl.
     */
    public function __construct()
    {
    }

    /**
     * Affiche la liste des catégories.
     *
     * Cette méthode récupère toutes les catégories en utilisant la méthode héritée `listCategories` de la classe parente `Controller`,
     * puis rend la vue de la liste des catégories dans le tableau de bord.
     *
     * @return void
     */
    public function read(): void
    {
        $this->checkConnexion();

        $pageScript = 'dash_list';
        $categories = $this->listCategories();

        require_once __DIR__.'/../../views/dashboard/categories/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Crée une nouvelle catégorie.
     *
     * Cette méthode gère le formulaire de création de catégorie. Si une requête POST est reçue et que le champ 'category' est correctement renseigné,
     * elle valide et insère la nouvelle catégorie dans la base de données. En cas d'erreur, elle renvoie un message d'erreur.
     *
     * @return void
     */
    public function create(): void
    {
        $this->checkConnexion();

        $pageScript = 'add_category';
        $title = 'Ajouter une Catégorie';
        $errorBack = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['category'])) {
                $sanitizeCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
                $validCategory = filter_var($sanitizeCategory, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=> REGEXP_NAME)));
                if ($validCategory) {
                    $category = new Category($validCategory);
                    $category->insert();
                    header('Location: /index.php?page=dashboard/categories');
                    die;
                } else {
                    $errorBack = 'Nom de catégorie non valide';
                }
            } else {
                $errorBack = 'Erreur lors de l\'envoi du nom';
            }
        }

        require_once __DIR__.'/../../views/dashboard/categories/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Met à jour une catégorie existante.
     *
     * Cette méthode vérifie la connexion, récupère les catégories existantes, et permet la mise à jour d'une catégorie spécifique.
     * Si l'ID de la catégorie à mettre à jour n'est pas spécifié ou est invalide, l'utilisateur est redirigé vers la liste des catégories.
     * Si le formulaire de mise à jour est soumis, la méthode valide et sanitize les données saisies avant de les mettre à jour dans la base de données.
     * En cas de succès, l'utilisateur est redirigé vers la liste des catégories.
     *
     * @return void
     */
    public function update(): void
    {
        $this->checkConnexion();
        $categories = $this->listCategories();
        $id = '';
        $name = '';
        $isOk = false;

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            foreach ($categories as $category) {
                if ($category->id_category == $id) {
                    $isOk = true;
                    $name = $category->name;
                }
            }
            if (!$isOk) {
                header('Location: /index.php?page=dashboard/categories');
                die;
            }
        } else {
            header('Location: /index.php?page=dashboard/categories');
            die;
        }
        
        $pageScript = 'add_category';
        $title = 'Modifier la Catégorie '.$name;
        $errorBack = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['category'])) {
                $sanitizeCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
                $validCategory = filter_var($sanitizeCategory, FILTER_VALIDATE_REGEXP, array('options'=>array('regexp'=> REGEXP_NAME)));
                if ($validCategory) {
                    $category = new Category($validCategory);
                    $category->id_category = $id;
                    $category->update();
                    header('Location: /index.php?page=dashboard/categories');
                    die;
                } else {
                    $errorBack = 'Nom de catégorie non valide';
                }
            } else {
                $errorBack = 'Erreur lors de l\'envoi du nom';
            }
        }

        require_once __DIR__.'/../../views/dashboard/categories/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    /**
     * Supprime une catégorie.
     * 
     * Cette méthode vérifie la connexion, récupère les catégories existantes, et permet la suppression d'une catégorie spécifique.
     * Si l'ID de la catégorie à supprimer n'est pas spécifié ou est invalide, l'utilisateur est redirigé vers la liste des catégories.
     *
     * @return void
     */
    public function delete(): void
    {
        $this->checkConnexion();
        $categories = $this->listCategories();
        $id = '';
        $name = '';
        $isOk = false;

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            foreach ($categories as $category) {
                if ($category->id_category == $id) {
                    $isOk = true;
                    $name = $category->name;
                }
            }
            if (!$isOk) {
                header('Location: /index.php?page=dashboard/categories');
                die;
            }
        } else {
            header('Location: /index.php?page=dashboard/categories');
            die;
        }

        $pageScript = 'del_category';
        $title = 'Supprimer la Catégorie '.$name;
        $errorBack = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = new Category();
            $category->id_category = $id;
            $category->delete();
            header('Location: /index.php?page=dashboard/categories');
            die;
        }

        require_once __DIR__.'/../../views/dashboard/categories/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}
