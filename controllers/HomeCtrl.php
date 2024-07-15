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
        $year = $this->year();
        $articles = $this->listArticles();
        $schedules = $this->listSchedules();
        $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
        $day = $date->format('N');
        $hour = $date->format('G');

        if ($schedules[$day-1]->opened == null && $schedules[$day-1]->closed == null) {
            $message = 'FERMÉ';
            $style = 'text-danger';
            $image = '/public/assets/img/close.png';
        } elseif ($schedules[$day-1]->closed < 12) {
            if ($hour < $schedules[$day-1]->opened || $hour >= ($schedules[$day]->closed ?? $schedules[0]->closed)) {
                $image = '/public/assets/img/close.png';
                $message = 'FERMÉ';
                $style = 'text-danger';
            } else {
                if ($hour >= $schedules[$day-1]->happy_start && $hour < $schedules[$day-1]->happy_end) {
                    $image = '/public/assets/img/happy-hour.png';
                    $message = 'OUVERT';
                    $style = 'text-success';
                } else {
                    $image = '/public/assets/img/open.png';
                    $message = 'OUVERT';
                    $style = 'text-success';
                }
                
            }
        } else {
            if ($hour < $schedules[$day-1]->opened || $hour >= $schedules[$day-1]->closed) {
                $image = '/public/assets/img/close.png';
                $message = 'FERMÉ';
                $style = 'text-danger';
            } else {
                if ($hour >= $schedules[$day-1]->happy_start && $hour < $schedules[$day-1]->happy_end) {
                    $image = '/public/assets/img/happy-hour.png';
                    $message = 'OUVERT';
                    $style = 'text-success';
                } else {
                    $image = '/public/assets/img/open.png';
                    $message = 'OUVERT';
                    $style = 'text-success';
                }
            }
        }

        require_once __DIR__ . '/../views/home.php';
        require_once __DIR__ . '/../views/templates/template.php';
    }
}