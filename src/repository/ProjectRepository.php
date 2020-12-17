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
            $project['image']
        );
    }

    public function getProjects(): array {
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
                $project['image']
            );
        }

        return $result;
    }

    public function addProject(Project $project): void {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO projects (title, description, category, date, location, id_user, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $id_user = 1; // TODO: change in future

        $stmt->execute([
            $project->getTitle(),
            $project->getDescription(),
            $project->getCategory(),
            $date->format('Y-m-d'),
            $project->getLocation(),
            $id_user,
            $project->getImage()
        ]);
    }
}