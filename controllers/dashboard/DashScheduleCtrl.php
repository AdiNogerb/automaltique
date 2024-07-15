<?php

class DashScheduleCtrl extends Controller
{
    public function __construct()
    {
    }

    public function read(): void
    {
        $this->checkConnexion();

        $pageScript = 'dash_list';
        $year = $this->year();
        $schedules = $this->listSchedules();

        require_once __DIR__.'/../../views/dashboard/schedules/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    public function update(): void
    {
        $this->checkConnexion();

        $pageScript = 'update_schedule';
        $year = $this->year();
        $schedules = $this->listSchedules();
        $isOk = false;

        if (!empty($_GET['id'])) {
            foreach ($schedules as $schedule) {
                if ($schedule->id_schedule == $_GET['id']) {
                $id = $_GET['id'];
                $scheduleSelected = $schedule;
                $isOk = true;
                }
            }
            if (!$isOk) {
            header('Location: /index.php?page=dashboard/schedules');
            die;
            }
        } else {
            header('Location: /index.php?page=dashboard/schedules');
            die;
        }

        $opened = $scheduleSelected->opened ?? null;
        $closed = $scheduleSelected->closed ?? null;
        $happy_start = $scheduleSelected->happy_start ?? null;
        $happy_end = $scheduleSelected->happy_end ?? null;
        $title = 'Modifier les horaires du '.$scheduleSelected->week_day;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validOpened = filter_input(INPUT_POST, 'opened', FILTER_SANITIZE_NUMBER_INT);
            $validClosed = filter_input(INPUT_POST, 'closed', FILTER_SANITIZE_NUMBER_INT);
            $validHappyStart = filter_input(INPUT_POST, 'happy_start', FILTER_SANITIZE_NUMBER_INT);
            $validHappyEnd = filter_input(INPUT_POST, 'happy_end', FILTER_SANITIZE_NUMBER_INT);
            if ($validOpened == '' || $validClosed == '' || $validHappyStart == '' || $validHappyEnd == '') {
                if ($validOpened == '' && $validClosed == '' && $validHappyStart == '' && $validHappyEnd == '') {
                    $validOpened = null;
                    $validClosed = null;
                    $validHappyStart = null;
                    $validHappyEnd = null;
                } else {
                    $errorBack = 'Les champs doivent tous être remplis ou tous être vides';
                }
            } else {
                if ($validOpened == $validClosed ||
                $validHappyStart == $validHappyEnd ||
                $validHappyStart > $validHappyEnd ||
                $validHappyStart < $validOpened) {
                    $errorBack = 'Veuillez vérifier la cohérence des horaires';
                }
            }
            if (!isset($errorBack)) {
                $schedule = new Schedule($scheduleSelected->week_day, $validOpened, $validClosed, $validHappyStart, $validHappyEnd);
                $schedule->id_schedule = $id;
                $schedule->update();
                header('Location: /index.php?page=dashboard/schedules');
                die;
            }
        }

        require_once __DIR__.'/../../views/dashboard/schedules/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}