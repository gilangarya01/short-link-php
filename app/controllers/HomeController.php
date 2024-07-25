<?php

class HomeController
{
    public function index()
    {
        require_once 'app/views/home/templates/header.php';
        require_once 'app/views/home/index.php';
        require_once 'app/views/home/templates/footer.php';
    }

    public function about()
    {
        require_once 'app/views/home/templates/header.php';
        require_once 'app/views/home/about.php';
        require_once 'app/views/home/templates/footer.php';
    }
}

?>