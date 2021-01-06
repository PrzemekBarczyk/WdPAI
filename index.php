<?php

require 'Routing.php';

// pobiera aktualną ścieżkę
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

// dodaje adresy URL do tablicy routing'u
Routing::get('', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('allProjects', 'DefaultController');
Routing::get('myProjects', 'DefaultController');
Routing::get('projectDetails', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');

Routing::run($path);