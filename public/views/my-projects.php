<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/projects.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>My project page</title>
</head>

<body>
    <div id="container">
        <?php include('header.php'); ?>
        <div id="content">
            <?php foreach ($myProjects as $project): ?>
                <div class="my-project">
                    <a class="link-image" href="project-details/<?= $project->getId(); ?>">
                        <img src="public/uploads/<?= $project->getImage(); ?>" alt="zdjęcie">
                    </a>
                    <h3 class="name">
                        <a href="project-details/<?= $project->getId(); ?>"><?= $project->getTitle(); ?></a>
                    </h3>
                    <h4 class="category"><?= $project->getCategory(); ?></h4>
                    <a class="link-delete" href="delete-project/<?= $project->getId(); ?>">
                        <div class="delete">Usuń</div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>