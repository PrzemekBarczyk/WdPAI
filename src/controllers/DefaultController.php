<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function all_projects() {
        $this->render('all_projects');
    }
    
    public function my_projects() {
        $this->render('my_projects');
    }

    public function add_project() {
        $this->render('add_project');
    }

    public function project_details() {
        $this->render('project_details');
    }
}