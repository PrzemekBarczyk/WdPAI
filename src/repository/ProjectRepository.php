<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository {

    public function getProject(int $id): ?Project {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) // project not found
            return null;

        return new Project(
            $project['title'],
            $project['description'],
            $project['category'],
            $project['date'],
            $project['location'],
            $project['id_user'],
            $project['image'],
            $project['id']
        );
    }

    public function getProjectByTitle(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE lower(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProjects(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $result[] = new Project(
                $project['title'],
                $project['description'],
                $project['category'],
                $project['date'],
                $project['location'],
                $project['id_user'],
                $project['image'],
                $project['id']
            );
        }

        return $result;
    }

    public function getMyProjects(int $userId): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE id_user = :userId
        ');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $result[] = new Project(
                $project['title'],
                $project['description'],
                $project['category'],
                $project['date'],
                $project['location'],
                $project['id_user'],
                $project['image'],
                $project['id']
            );
        }

        return $result;
    }

    public function addProject(Project $project): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO projects (title, description, category, date, location, id_user, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $project->getTitle(),
            $project->getDescription(),
            $project->getCategory(),
            $project->getDate(),
            $project->getLocation(),
            $project->getUserId(),
            $project->getImage()
        ]);
    }
}