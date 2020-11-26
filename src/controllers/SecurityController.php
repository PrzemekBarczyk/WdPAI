<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {

        $user = new user('jsnow@pk.edu.pl', 'admin', 'John', 'Snow');

        if (!$this->isPost()) { //
            return $this->render('login');
        } else if (isset($_POST['left-button'])) { // naciśnięto lewy przycisk
            return $this->render('register');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Użytkownik o podanym adresie email nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Błędne hasło!']]);
        }

        return $this->render('all-projects');
    }
}