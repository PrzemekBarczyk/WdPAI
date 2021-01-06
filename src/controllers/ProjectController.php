<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

/**
 * Handles adding project
 */
class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $projectRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }

    public function allProjects() {
        $allProjects = $this->projectRepository->getProjects();
        return $this->render('all-projects', ['allProjects' => $allProjects]);
    }

    public function addProject() {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $date = getdate(date("U"));
            $project = new Project(
                $_POST['title'],
                $_POST['description'],
                $_POST['category'],
                $date["mday"].$date["month"].$date["year"],
                "Kraków", // TODO: zmienić
                $_POST['file']['name']
            );
            $this->projectRepository->addProject($project); // TODO: naprawić

            return $this->render('all-projects', [
                'allProjects' => $this->projectRepository->getProjects(),
                'messages' => $this->messages, 'project' => $project
            ]);
        }

        $this->render('add-project');
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
}