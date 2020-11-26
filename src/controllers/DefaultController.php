<?php

require_once 'AppController.php';

/*
 * W zależności od wywołanej metody tworzy odpowiadający jej widok.
 */
class DefaultController extends AppController {
    
    public function index() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function all_projects() {
        $this->render('all-projects');
    }
    
    public function my_projects() {
        $this->render('my-projects');
    }

    public function add_project() {
        $this->render('add-project');
    }

    public function project_details() {
        $this->render('project-details');
    }
}