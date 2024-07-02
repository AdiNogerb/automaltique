<?php
require __DIR__.'/controllers/HomeCtrl.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'menu':
            # code...
            break;
        
        default:
            $page = new HomeCtrl();
            $page->renderView();
            break;
    }
}