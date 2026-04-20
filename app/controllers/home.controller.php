<?php
require_once __DIR__ . '/../views/home.view.php';

class HomeController
{
    private $view;

    public function __construct()
    {
        $this->view = new HomeView();
    }

    public function index()
    {
        $this->view->render();
    }
}
