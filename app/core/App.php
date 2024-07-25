<?php

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (!empty($url) && file_exists("app/controllers/{$url[0]}Controller.php")) {
            $this->controller = $url[0] . 'Controller';
            unset($url[0]);
        } else {
            // Redirect short url
            require_once 'app/models/RedirectShort.php';
            $redirectShort = new RedirectShort();

            if (isset($url[0])) {
                $redirectShort->shortRedirect($url[0]);
            }
        }

        require_once "app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }

}

?>