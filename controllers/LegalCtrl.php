<?php
class LegalCtrl extends Controller
{
    public function __construct()
    {
    }

    public function renderView()
    {
        $year = $this->year();

        require_once __DIR__ . '/../views/legal.php';
        require_once __DIR__ . '/../views/templates/template.php';
    }
}