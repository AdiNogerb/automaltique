<?php

/**
 * Contrôleur de la page d'accueil du tableau de bord.
 *
 * Ce contrôleur étend la classe Controller et fournit une méthode pour rendre la vue de la page d'accueil du tableau de bord.
 */
class DashHomeCtrl extends Controller
{
    /**
     * Constructeur de la classe DashHomeCtrl.
     *
     * Initialise une nouvelle instance de la classe DashHomeCtrl.
     */
    public function __construct()
    {
    }

    /**
     * Rend la vue de la page d'accueil du tableau de bord.
     *
     * Cette méthode vérifie si une méthode POST a été envoyée. Si le champ 'password' est rempli et correspond à la constante PASSWORD définie,
     * un cookie 'Admin' est défini pour indiquer la connexion réussie, et la page est rafraîchie pour refléter l'état de connexion.
     * Ensuite, la méthode affiche la vue de la page d'accueil du tableau de bord.
     *
     * @return void
     */
    public function renderView()
    {
        $pageScript = 'dash_home';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['password'])) {
                if ($_POST['password'] === PASSWORD) {
                    setcookie('Admin', 'connexion_true', time() + 3600, "/");
                    header('Refresh:0');
                    die();
                }
            }
        }

        require_once __DIR__ . '/../../views/dashboard/home.php';
        require_once __DIR__ . '/../../views/templates/template.php';
    }
}