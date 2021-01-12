<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/header-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/projects.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer-bar.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>My project page</title>
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo-container">
                <a href="all-projects">
                    <img src="/public/img/logo.PNG" alt="logo">
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
            <a href="logout">
                <button id="button-logout">Wyloguj</button>
            </a>
        </div>

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