<?

session_start();

require_once __DIR__.'/../repository/UserRepository.php';

class SessionController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function isSessionSet() {
        return isset($_SESSION) && $_SESSION["logged"] == true;
    }

    public function setSession($userEmail) {
        $userId = $this->userRepository->getUser($userEmail)->getId();

        $_SESSION["logged"] = true;
        $_SESSION["id"] = $userId;
        $_SESSION["email"] = $userEmail;
    }

    public function logout() {
        session_unset();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }
}