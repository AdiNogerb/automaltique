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
}