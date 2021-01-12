<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/header-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/projects.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer-bar.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>All project page</title>
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo-container">
                <a href="all-projects">
                    <img src="/public/img/logo.PNG">
                </a>
            </div>
            <div id="search-bar">
                <input class="input-field" name="search" type="text" placeholder="Wyszukaj...">
                <i class="fas fa-search"></i>
            </div>
            <a href="add-project">
                <button id="button-add">
                    <i class="far fa-plus-square"></i>
                    Dodaj ogłoszenie
                </button>
            </a>
            <a href="my-projects">
                <button id="button-my">Moje ogłoszenia</button>
            </a>
            <a href="">
                <button id="button-logout">Wyloguj</button>
            </a>
        </div>

        <div id="content">
            <?php foreach ($allProjects as $project): ?>
                <div class="project">
                    <img src="public/uploads/<?= $project->getImage(); ?>" alt="zdjęcie">
                    <h3 class="name"><?= $project->getTitle(); ?></h3>
                    <h4 class="category"><?= $project->getCategory(); ?></h4>
                    <h4 class="location-and-date"><?= $project->getLocation(); ?>  <?= $project->getDate(); ?></h4>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="footer-bar">
            <a href="my-projects">
                <button id="footer-button-my">
                    <i class="fas fa-comment-alt"></i>
                    Moje ogłoszenia
                </button>
            </a>
            <a href="add-project">
                <button id="footer-button-add">
                    <i class="far fa-plus-square"></i>
                    Dodaj ogłoszenie
                </button>
            </a>
            <a href="">
                <button id="footer-button-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Wyloguj
                </button>
            </a>
        </div>
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