<?php
require_once __DIR__ . '/../views/home.view.phtml';

class HomeController
{
    private $view;

    public function __construct()
    {
        $this->view = new HomeView();
    }

    public function index($req)
    {

        $this->view->render($req);
    }
}
