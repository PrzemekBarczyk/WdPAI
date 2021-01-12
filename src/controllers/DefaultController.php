<?php

require_once 'AppController.php';

/*
 * W zależności od wywołanej metody wyświetla odpowiadający jej widok.
 */
class DefaultController extends AppController {
    
    public function index() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }
    
    public function myProjects() {
        $this->render('my-projectPicker');
    }

    public function addProject() {
        $this->render('add-project');
    }

    public function projectDetails() {
        $this->render('project-details');
    }
}