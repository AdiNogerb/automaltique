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
        $schedules = $this->listSchedules();

        require_once __DIR__.'/../../views/dashboard/schedules/list.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }

    public function update(): void
    {
        $this->checkConnexion();

        $pageScript = 'update_schedule';
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
            var_dump($_POST);
        }

        require_once __DIR__.'/../../views/dashboard/schedules/add.php';
        require_once __DIR__.'/../../views/templates/template.php';
    }
}