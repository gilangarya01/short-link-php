<?php

class App
{
    public function __construct()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $uriParts = explode('/', $uri);
        $controllerName = 'HomeController';
        $methodName = 'index';
        $id = [];

        if (!empty($uri) && file_exists("app/controllers/" . ucfirst($uriParts[0]) . "Controller.php")) {
            $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) . 'Controller' : 'HomeController';
            $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'index';
            $id = $uriParts[2] ?? null;
        } else {
            // Redirect short url
            require_once 'app/models/RedirectShort.php';
            $redirectShort = new RedirectShort();

            if (isset($uri)) {
                $redirectShort->shortRedirect($uri);
            }
        }

        require_once "app/controllers/$controllerName.php";
        $controller = new $controllerName;

        if ($id) {
            $controller->$methodName($id);
        } else {
            $controller->$methodName();
        }
    }

}

?>