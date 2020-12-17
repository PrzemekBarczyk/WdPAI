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
        $action = explode("/", $url)[0]; // creates name of function responsible for handling url (returns arrays of strings, created by splitting $url)

        // converts actions with "-" eg. "all-projects" -> "appProjects"
        if (strpos($action, "-")) {
            $dashIndex = strpos($action, "-");
            $action = str_replace($action[$dashIndex+1], strtoupper($action[$dashIndex+1]), $action);
            $action = str_replace("-", "", $action);
        }

        if (!array_key_exists($action, self::$routes)) { // given url is not in routing's table
            die("Wrong url!");
        }

        $controller = self::$routes[$action]; // finds controller responsible for this action
        $object = new $controller;
        $action = $action ?: 'index'; // return 'index' if $action doesn't exist
        $object->$action(); // runs method to handle given url
    }
}