<?php

session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $projectRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
        $this->userRepository = new UserRepository();
    }

    public function allProjects() {
        // TODO: check if sesion established, if not go to login page

        $allProjects = $this->projectRepository->getAllProjects();
        $this->render('all-projects', ['allProjects' => $allProjects]);
    }

    public function myProjects() {
        // TODO: check if sesion established, if not go to login page

        $userId = $this->userRepository->getUser($_SESSION["email"])->getId();

        $myProjects = $this->projectRepository->getMyProjects($userId); // TODO: check if works correctly
        $this->render('my-projects', ['myProjects' => $myProjects]);
    }

    public function addProject() {
        // TODO: check if sesion established, if not go to login page

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user = $this->userRepository->getUser($_SESSION["email"]); // gets actual user info from database using session
            $localization = $user->getLocation();
            $userId = $user->getId();

            $project = new Project(
                $_POST['title'],
                $_POST['description'],
                $_POST['category'],
                date("Y-m-d"),
                $localization,
                $userId,
                $_FILES['file']['name']
            );

            $this->projectRepository->addProject($project); // TODO: naprawić

            $this->render('all-projects', [
                'allProjects' => $this->projectRepository->getAllProjects(),
                'messages' => $this->messages, 'project' => $project
            ]);
        }

        else {
            $this->render('add-project');
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Plik jest za duży';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Typ pliku nie jest wspierany';
            return false;
        }

        return true;
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
    }
}