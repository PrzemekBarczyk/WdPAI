<?php

require 'Routing.php';

// get actual path
$path = trim($_SERVER['REQUEST_URI'], '/'); // return URI without '/'
$path = parse_url($path, PHP_URL_PATH); // returns last part of url eg. "all-project"

// defines which controller handles which url by adding them to associative array
Routing::get('', 'DefaultController');
Routing::get('allProjects', 'ProjectController');
Routing::get('myProjects', 'ProjectController');
Routing::get('deleteProject', 'ProjectController');
Routing::get('projectDetails', 'ProjectController');
Routing::post('login', 'SecurityController'); // login is form's action name
Routing::post('register', 'SecurityController'); // same like above
Routing::post('addProject', 'ProjectController');
Routing::post('logout', 'SessionController');

// runs proper method in proper controller for given path
Routing::run($path);