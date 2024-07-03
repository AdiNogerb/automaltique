<?php

/**
 * Contrôleur HomeCtrl
 *
 * Ce contrôleur étend la classe Controller et cette classe est responsable de la logique de contrôle de la page d'accueil.
 */
class HomeCtrl extends Controller
{
    /**
     * Constructeur de la classe HomeCtrl.
     *
     * Initialise une nouvelle instance de la classe HomeCtrl.
     */
    public function __construct()
    {
    }

    /**
     * Affiche la vue de la page d'accueil.
     *
     * Cette méthode détermine le message, le style et l'image à afficher en fonction du jour de la semaine et de l'heure actuelle.
     * Ensuite, elle inclut les fichiers de vue correspondants.
     *
     * @return void
     */
    public function renderView(): void
    {
        $pageScript = 'home';

        $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
        $day = $date->format('N');
        $hour = $date->format('G');

        switch ($day) {
            case '1':
                $message = 'FERMÉ';
                $style = 'text-danger';
                $image = '/public/assets/img/close.png';
                break;
            
            case '2':
                if ($hour >= 17 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour >= 17) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour >= 17) ? 'text-success' : 'text-danger' ;
                break;
                
            case '3':
                if ($hour >= 17 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour < 1 || $hour >= 17) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour < 1 || $hour >= 17) ? 'text-success' : 'text-danger' ;
                break;
            
            case '4':
                if ($hour >= 17 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour < 1 || $hour >= 17) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour < 1 || $hour >= 17) ? 'text-success' : 'text-danger' ;
                break;
            
            case '5':
                if ($hour >= 17 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour < 2 || $hour >= 17) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour < 2 || $hour >= 17) ? 'text-success' : 'text-danger' ;
                break;
                
            case '6':
                if ($hour >= 17 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour < 2 || $hour >= 17) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour < 2 || $hour >= 17) ? 'text-success' : 'text-danger' ;
                break;
            
            case '7':
                if ($hour >= 18 && $hour < 20) {
                    $image = '/public/assets/img/happy-hour.png';
                } else if ($hour >= 20) {
                    $image = '/public/assets/img/open.png';
                } else {
                    $image = '/public/assets/img/close.png';
                }
                $message = ($hour < 2 || $hour >= 18) ? 'OUVERT' : 'FERMÉ' ;
                $style = ($hour < 2 || $hour >= 18) ? 'text-success' : 'text-danger' ;
                break;
                
            default:
                $message = 'null';
                break;
        }

        require_once __DIR__ . '/../views/home.php';
        require_once __DIR__ . '/../views/templates/template.php';
    }
}