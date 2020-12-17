<?php

require 'Routing.php';

// get actual path
$path = trim($_SERVER['REQUEST_URI'], '/'); // return URI without '/' eg. "all-projects"
$path = parse_url($path, PHP_URL_PATH); // returns last part of url eg. "all-projects"

// defines which controller handles which url
Routing::get('', 'DefaultController');
Routing::get('allProjects', 'ProjectController');
Routing::get('myProjects', 'DefaultController');
Routing::get('projectDetails', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addProject', 'ProjectController');

Routing::run($path);