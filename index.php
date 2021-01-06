<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('all_projects', 'DefaultController');
Routing::get('my_projects', 'DefaultController');
Routing::get('add_project', 'DefaultController');
Routing::get('project_details', 'DefaultController');
Routing::get('login', 'SecurityController');

Routing::run($path);