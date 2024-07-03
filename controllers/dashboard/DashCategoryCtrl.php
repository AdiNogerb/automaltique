<?php

class DashCategoryCtrl extends Controller
{
    public function __construct()
    {
    }

    public function read()
    {
        $pageScript = 'dash_home';
        $categories = $this->listCategories();

        require_once __DIR__.'/../../views/dashboard/categories/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}