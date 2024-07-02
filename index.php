<?php
require __DIR__.'/controllers/HomeCtrl.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            $page = new HomeCtrl();
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