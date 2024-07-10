<?php

class DashScheduleCtrl extends Controller
{
   public function __construct()
   {
   }

   public function read()
   {
    $this->checkConnexion();

    $schedules = $this->listSchedules();

    require_once __DIR__.'/../../views/dashboard/schedules/list.php';
    require_once __DIR__.'/../../views/templates/template.php';
   }
}