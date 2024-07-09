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
                if (!$validTitle) {
                    $errorBack = 'Erreur lors de l\'envoi du titre';
                }
                $validContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!$validContent) {
                    $errorBack = 'Erreur lors de l\'envoi du contenu';
                }
                $pictureTemp = $_FILES['picture'];
                $allowedTypes = ['image/jpeg', 'image/png'];
                $imageType = mime_content_type($pictureTemp['tmp_name']);
                if (in_array($imageType, $allowedTypes)) {
                    if ($imageType === 'image/jpeg') {
                        $image = imagecreatefromjpeg($pictureTemp['tmp_name']);
                        $type = '.jpg';
                    } elseif ($imageType === 'image/png') {
                        $image = imagecreatefrompng($pictureTemp['tmp_name']);
                        $type = '.png';
                    }
                    $width = imagesx($image);
                    $height = imagesy($image);
                    $aspectRatio = 1;
                    if ($width / $height > $aspectRatio) {
                        $newWidth = floor($height * $aspectRatio);
                        $newHeight = $height;
                        $xOffset = floor(($width - $newWidth) / 2);
                        $yOffset = 0;
                    } else {
                        $newWidth = $width;
                        $newHeight = floor($width / $aspectRatio);
                        $xOffset = 0;
                        $yOffset = floor(($height - $newHeight) / 2);
                    }
                    $croppedImage = imagecreatetruecolor($newWidth, $newHeight);
                    if ($imageType === 'image/png') {
                        imagealphablending($croppedImage, false);
                        imagesavealpha($croppedImage, true);
                        $transparent = imagecolorallocatealpha($croppedImage, 0, 0, 0, 127);
                        imagefilledrectangle($croppedImage, 0, 0, $newWidth, $newHeight, $transparent);
                    }
                    imagecopyresampled($croppedImage, $image, 0, 0, $xOffset, $yOffset, $newWidth, $newHeight, $newWidth, $newHeight);
                    $uniqId = uniqid();
                    $outputDir = __DIR__.'/../../public/assets/img/';
                    $outputFile = $outputDir . $uniqId . ($imageType === 'image/jpeg' ? '.jpg' : '.png');
                    if ($imageType === 'image/jpeg') {
                        imagejpeg($croppedImage, $outputFile);
                    } elseif ($imageType === 'image/png') {
                        imagepng($croppedImage, $outputFile);
                    }
                    imagedestroy($image);
                    imagedestroy($croppedImage);
                } else {
                    $errorBack = 'Erreur lors de l\'envoi de l\'image';
                }
                if (!isset($errorBack)) {
                    $validPicture = $uniqId.$type;
                    $article = new Article($validTitle, $validContent, $validPicture);
                    $article->insert();
                    header('Location: /index.php?page=dashboard/articles');
                    die;
                }
            } else {
                $errorBack = 'Erreur lors de l\'envoi des données';
            }            
        }
        
        require_once __DIR__.'/../../views/dashboard/articles/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    public function update(): void
    {
        $this->checkConnexion();
        
        $pageScript = 'update_article';
        $articles = $this->listArticles();
        $isOk = false;
        $update = true;

        if (!empty($_GET['id'])) {
            foreach ($articles as $article) {
                if ($article->id_article == $_GET['id']) {
                    $id = $_GET['id'];
                    $articleSelected = $article;
                    $isOk = true;
                }
            }
            if (!$isOk) {
                header('Location: /index.php?page=dashboard/articles');
                die;
            }
        } else {
            header('Location: /index.php?page=dashboard/articles');
            die;
        }

        $validTitle = $articleSelected->title;
        $validContent = $articleSelected->content;
        $validPicture = $articleSelected-> picture;
        $title = 'Modifier l\'article '.$validTitle;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['title'])) {
                $sanitizeTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
                $validTitle = filter_var($sanitizeTitle, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_PRODUCT_NAME)));
                if (!$validTitle) {
                    $errorBack = 'Titre non valide';
                }
            }
            if (!empty($_POST['content'])) {
                $validContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!$validContent) {
                    $errorBack = 'Contenu de l\'article non valide';
                }
            }
            if (!empty($_FILES['picture'])) {
                $pictureTemp = $_FILES['picture'];
                $allowedTypes = ['image/jpeg', 'image/png'];
                $imageType = mime_content_type($pictureTemp['tmp_name']);
                if (in_array($imageType, $allowedTypes)) {
                    if ($imageType === 'image/jpeg') {
                        $image = imagecreatefromjpeg($pictureTemp['tmp_name']);
                        $type = '.jpg';
                    } elseif ($imageType === 'image/png') {
                        $image = imagecreatefrompng($pictureTemp['tmp_name']);
                        $type = '.png';
                    }
                    $width = imagesx($image);
                    $height = imagesy($image);
                    $aspectRatio = 1;
                    if ($width / $height > $aspectRatio) {
                        $newWidth = floor($height * $aspectRatio);
                        $newHeight = $height;
                        $xOffset = floor(($width - $newWidth) / 2);
                        $yOffset = 0;
                    } else {
                        $newWidth = $width;
                        $newHeight = floor($width / $aspectRatio);
                        $xOffset = 0;
                        $yOffset = floor(($height - $newHeight) / 2);
                    }
                    $croppedImage = imagecreatetruecolor($newWidth, $newHeight);
                    if ($imageType === 'image/png') {
                        imagealphablending($croppedImage, false);
                        imagesavealpha($croppedImage, true);
                        $transparent = imagecolorallocatealpha($croppedImage, 0, 0, 0, 127);
                        imagefilledrectangle($croppedImage, 0, 0, $newWidth, $newHeight, $transparent);
                    }
                    imagecopyresampled($croppedImage, $image, 0, 0, $xOffset, $yOffset, $newWidth, $newHeight, $newWidth, $newHeight);
                    $uniqId = uniqid();
                    $outputDir = __DIR__.'/../../public/assets/img/';
                    $outputFile = $outputDir . $uniqId . ($imageType === 'image/jpeg' ? '.jpg' : '.png');
                    if ($imageType === 'image/jpeg') {
                        imagejpeg($croppedImage, $outputFile);
                    } elseif ($imageType === 'image/png') {
                        imagepng($croppedImage, $outputFile);
                    }
                    imagedestroy($image);
                    imagedestroy($croppedImage);
                    unlink(__DIR__.'/../../public/assets/img/'.$validPicture);
                    $validPicture = $uniqId.$type;
                } else {
                    $errorBack = 'Erreur lors de l\'envoi de l\'image';
                }
            }
            if (!isset($errorBack)) {
                $article = new Article($validTitle, $validContent, $validPicture);
                $article->id_article = $id;
                $article->update();
                header('Location: /index.php?page=dashboard/articles');
                die;
            }
        }

        require_once __DIR__.'/../../views/dashboard/articles/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}