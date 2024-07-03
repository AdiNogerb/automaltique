<?php

/**
 * Contrôleur de la gestion des catégories dans le tableau de bord.
 *
 * Ce contrôleur étend la classe Controller et fournit des méthodes pour lire et créer des catégories.
 */
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
        $pageScript = 'dash_home';
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
        $pageScript = 'add_category';
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
}
