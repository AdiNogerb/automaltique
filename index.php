<?php
require __DIR__.'/configs/configs.php';
require __DIR__.'/helpers/AccessorTrait.php';
require __DIR__.'/models/Database.php';
require __DIR__.'/models/BaseModel.php';
require __DIR__.'/models/Category.php';
require __DIR__.'/models/Product.php';
require __DIR__.'/models/Article.php';
require __DIR__.'/models/Schedule.php';
require __DIR__.'/controllers/Controller.php';
require __DIR__.'/controllers/HomeCtrl.php';
require __DIR__.'/controllers/MenuCtrl.php';
require __DIR__.'/controllers/LegalCtrl.php';
require __DIR__.'/controllers/dashboard/DashHomeCtrl.php';
require __DIR__.'/controllers/dashboard/DashCategoryCtrl.php';
require __DIR__.'/controllers/dashboard/DashProductCtrl.php';
require __DIR__.'/controllers/dashboard/DashArticleCtrl.php';
require __DIR__.'/controllers/dashboard/DashScheduleCtrl.php';

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

        case 'dashboard':
            $page = new DashHomeCtrl();
            $page->renderView();
            break;

        case 'dashboard/categories':
            $page = new DashCategoryCtrl();
            $page->read();
            break;

        case 'dashboard/categories/add':
            $page = new DashCategoryCtrl();
            $page->create();
            break;

        case 'dashboard/categories/update':
            $page = new DashCategoryCtrl();
            $page->update();
            break;
        
        case 'dashboard/categories/delete':
            $page = new DashCategoryCtrl();
            $page->delete();
            break;

        case 'dashboard/products':
            $page = new DashProductCtrl();
            $page->read();
            break;

        case 'dashboard/products/add':
            $page = new DashProductCtrl();
            $page->create();
            break;

        case 'dashboard/products/update':
            $page = new DashProductCtrl();
            $page->update();
            break;

        case 'dashboard/products/delete':
            $page = new DashProductCtrl();
            $page->delete();
            break;

        case 'dashboard/articles':
            $page = new DashArticleCtrl();
            $page->read();
            break;

        case 'dashboard/articles/add':
            $page = new DashArticleCtrl();
            $page->create();
            break;

        case 'dashboard/articles/update':
            $page = new DashArticleCtrl();
            $page->update();
            break;

        case 'dashboard/articles/delete':
            $page = new DashArticleCtrl();
            $page->delete();
            break;

        case 'dashboard/schedules':
            $page = new DashScheduleCtrl();
            $page->read();
            break;

        case 'dashboard/schedules/update':
            $page = new DashScheduleCtrl();
            $page->update();
            break;

        case 'legal':
            $page = new LegalCtrl();
            $page->renderView();
            break;

        default:
            header('Location: /index.php?page=home');
            die;
    }
} else {
    header('Location: /index.php?page=home');
    die;
}