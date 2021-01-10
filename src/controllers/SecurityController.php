<?php

session_start();

require_once 'AppController.php';
require_once __DIR__.'/../controllers/SessionController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

/**
 * Handles login and register
 */
class SecurityController extends AppController {

    private $sessionController;
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->sessionController = new SessionController();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
            return;
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            $this->render('login', ['messages' => ['Użytkownik nie istnieje!']]);
            return;
        }
        else if ($user->getEmail() !== $email) {
            $this->render('login', ['messages' => ['Użytkownik o podanym adresie email nie istnieje!']]);
            return;
        }
        else if ($user->getPassword() !== $password) {
            $this->render('login', ['messages' => ['Błędne hasło!']]);
            return;
        }

        $this->sessionController->setSession($user->getEmail());

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-projects");
    }

    public function register() {
        if (!$this->isPost()) {
            $this->render('register');
        }
        else {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $location = $_POST['location'];
            $password = $_POST['password'];

            $user = new User(0, $email, $phone, $location, md5($password));

            $this->userRepository->addUser($user);

            $this->sessionController->deleteSesion();

            $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }


    }
}