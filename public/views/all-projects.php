<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/projects.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>All project page</title>
</head>

<body>
    <div id="container">
        <?php include('header.php'); ?>
        <div id="content">
            <?php foreach ($allProjects as $project): ?>
                <div class="project">
                    <a class="link-image" href="project-details/<?= $project->getId(); ?>">
                        <img src="public/uploads/<?= $project->getImage(); ?>" alt="zdjęcie">
                    </a>
                    <h3 class="name">
                        <a href="project-details/<?= $project->getId(); ?>"><?= $project->getTitle(); ?></a>
                    </h3>
                    <h4 class="category"><?= $project->getCategory(); ?></h4>
                    <h4 class="location-and-date"><?= $project->getLocation(); ?>  <?= $project->getDate(); ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>

<template id="project-template">
    <div class="project">
        <img src="">
        <h3 class="name"></h3>
        <h4 class="category"></h4>
        <h4 class="location-and-date"></h4>
    </div>
</template>