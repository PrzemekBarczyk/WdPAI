<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ProjectController.php';

class Routing {

    public static $routes; // tablica asocjacyjna z parami "url"=>"widok"

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if (!array_key_exists($action, self::$routes)) { // podany URL nie znajduje się w tablicy routing'u
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index'; // zwróci 'index' jeśli $action nie istnieje

        $object->$action();
    }
}