<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez l'Automaltique, le bar à bière incontournable à Amiens ! Profitez de nos soirées blind test animées et conviviales tout en dégustant une sélection unique de bières artisanales. Rejoignez-nous pour une expérience inoubliable !">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <script src="https://kit.fontawesome.com/e0df362f98.js" crossorigin="anonymous"></script>

    <title>Automaltique - Le Bar à Bière Incontournable à Amiens</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Automaltique - Le Bar à Bière Incontournable à Amiens" />
    <meta property="og:description" content="Découvrez l'Automaltique, le bar à bière incontournable à Amiens ! Profitez de nos soirées blind test animées et conviviales tout en dégustant une sélection unique de bières artisanales. Rejoignez-nous pour une expérience inoubliable !" />
    <meta property="og:image" content="https://automaltique.fr/public/assets/img/favicon.png" />
    <meta property="og:url" content="https://automaltique.fr" />
    <meta property="og:type" content="website" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Automaltique - Le Bar à Bière Incontournable à Amiens">
    <meta name="twitter:description" content="Découvrez l'Automaltique, le bar à bière incontournable à Amiens ! Profitez de nos soirées blind test animées et conviviales tout en dégustant une sélection unique de bières artisanales. Rejoignez-nous pour une expérience inoubliable !">
    <meta name="twitter:image" content="https://automaltique.fr/public/assets/img/favicon.png">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-black sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php?page=home">
                <img id="navLogo" src="/public/assets/img/logo_white.png" alt="logo automaltique" class="ms-3">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center me-lg-3">
                    <li class="nav-item">
                        <a class="noto-sans nav-link <?=($_GET['page'] === 'home') ? 'text-yellow fw-bold' : 'text-white'?>" href="/index.php?page=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="noto-sans nav-link <?=($_GET['page'] === 'menu') ? 'text-yellow fw-bold' : 'text-white'?>" href="/index.php?page=menu">Carte</a>
                    </li>
                    <?php
                    if (strpos($_GET['page'], 'dashboard') !== false) {?>
                        <li class="nav-item">
                            <a class="noto-sans nav-link text-yellow fw-bold" href="/index.php?page=dashboard">Paramètres</a>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-8 col-lg-6 my-5 image-container">
                    <img id="logo" src="/public/assets/img/logo_white.png" alt="logo automaltique" class="img-fluid">
                </div>
            </div>
        </div>
    </header>
    <main class="pt-5">
        <h1 class="poetsen-one-regular text-center title mt-lg-5 mb-lg-5"><span id="title-mark" class="text-decoration-underline text-yellow">L'Automaltique</span><br><span class="text-blue">Bar à Bière et Blind Test</span></h1>

        <?=$main??''?>

    </main>
    <footer class="pt-5">
        <h2 class="poetsen-one-regular text-white text-center fs-1 text-decoration-underline mb-3">Suivez nous</h2>
        <div class="d-flex justify-content-center mb-5">
            <a href="https://www.facebook.com/Automaltique/" target="_blank"><i class="fa-2xl fa-brands fa-facebook" style="color: #ffffff;"></i></a>
            <a href="https://www.instagram.com/lautomaltique/" target="_blank"><i class="fa-2xl fa-brands fa-instagram mx-5" style="color: #ffffff;"></i></a>
            <a href=""><i class="fa-2xl fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-around">
            <p id="copyright" class="noto-sans text-center py-3 text-white m-0">&copy; <?=$year?> XR BAR&CO. Tous droits réservés. || <a href="/index.php?page=legal" target="_blank" class="text-white">Mentions Légales</a></p>
            <p class="noto-sans text-center py-3 text-white m-0">Développé par <a href="https://adrienbregon.fr/" target="_blank" class="text-yellow">Adrien Bregon</a></p>
        </div>
    </footer>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/banner.js"></script>
    <?=(isset($pageScript)) ? '<script src="/public/assets/js/'.$pageScript.'.js"></script>' : ''?>
</body>
</html>