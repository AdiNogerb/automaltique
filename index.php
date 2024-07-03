<?php
require __DIR__.'/configs/configs.php';
require __DIR__.'/helpers/AccessorTrait.php';
require __DIR__.'/models/Database.php';
require __DIR__.'/models/BaseModel.php';
require __DIR__.'/models/Category.php';
require __DIR__.'/models/Product.php';
require __DIR__.'/controllers/Controller.php';
require __DIR__.'/controllers/HomeCtrl.php';
require __DIR__.'/controllers/MenuCtrl.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            $page = new HomeCtrl();
            $page->renderView();
            break;
        
        case 'menu':
            $page = new MenuCtrl();
            $page->renderView();
            break;

        default:
            $page = new HomeCtrl();
            $page->renderView();
            break;
    }
} else {
    header('Location: /index.php?page=home');
    die;
}