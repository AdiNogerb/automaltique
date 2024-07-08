<?php

class DashArticleCtrl extends Controller
{
    public function __construct()
    {
    }

    public function read(): void
    {
        $this->checkConnexion();

        $pageScript = 'dash_home';
        $articles = $this->listArticles();

        require_once __DIR__.'/../../views/dashboard/articles/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    public function create(): void
    {
        $this->checkConnexion();

        $pageScript = 'add_article';
        $title = 'Ajouter un nouvel article';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['picture'])) {
                $sanitizeTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
                $validTitle = filter_var($sanitizeTitle, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRODUCT_NAME)));

                $validContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
                var_dump($validContent);
                
            } else {
                $errorBack = 'Erreur lors de l\'envoi des données';
            }            
        }
        
        require_once __DIR__.'/../../views/dashboard/articles/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}