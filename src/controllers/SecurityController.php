<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

/**
 * Handles login and register
 */
class SecurityController extends AppController {

    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['Użytkownik nie istnieje!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Użytkownik o podanym adresie email nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Błędne hasło!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-projects");
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $password = $_POST['password'];

        $user = new User($email, $phone, $location, md5($password));

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}