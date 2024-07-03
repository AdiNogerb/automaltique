<?php

require __DIR__.'/../configs/configs.php';
require __DIR__.'/../models/Database.php';
require __DIR__.'/../helpers/AccessorTrait.php';
require __DIR__.'/../models/BaseModel.php';
require __DIR__.'/../models/Category.php';

$categoryModel = new Category();
$categories = $categoryModel->getAll();
$categoriesJson = json_encode($categories);

header('Content-Type: application/json');
echo $categoriesJson;