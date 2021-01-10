<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/header-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/details-add.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer-bar.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Project details page</title>
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo-container">
                <a href="/all-projects">
                    <img src="/public/img/logo.PNG">
                </a>
            </div>
            <div id="search-bar">
                <input class="input-field" name="search" type="text" placeholder="Wyszukaj...">
                <i class="fas fa-search"></i>
            </div>
            <a href="/add-project">
                <button id="button-add">
                    <i class="far fa-plus-square"></i>
                    Dodaj ogłoszenie
                </button>
            </a>
            <a href="/my-projects">
                <button id="button-my">Moje ogłoszenia</button>
            </a>
            <a href="">
                <button id="button-logout">Wyloguj</button>
            </a>
        </div>
        <div id="grid">
            <div id="title">
                <h4>Tytuł</h4>
                <h5><?= $project->getTitle(); ?></h5>
            </div>
            <div id="image">
                <img src="public/uploads/<?= $project->getImage(); ?>" alt="zdjęcie">
            </div>
            <div id="phone">
                <h4>Numer telefonu</h4>
                <h5><?= $user->getPhone(); ?></h5>
            </div>
            <div id="location">
                <h4>Lokalizacja</h4>
                <h5><?= $project->getLocation(); ?> </h5>
            </div>
            <div id="description">
                <h4>Opis</h4>
                <h5>
                    <p><?= $project->getDescription(); ?> </p>
                </h5>
            </div>
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