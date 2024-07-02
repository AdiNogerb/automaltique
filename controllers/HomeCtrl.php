<?php

class HomeCtrl
{
    public function __construct()
    {
    }

    /**
     * Appel des fichiers vues demandés pour la page d'accueil
     *
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