<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/header-bar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/details-add.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer-bar.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Add project page</title>
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
            <a href="">
                <button id="button-logout">Wyloguj</button>
            </a>
        </div>
        
        <div id="content">
            <form action="add-project" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div id="entry-title">
                    <div class="square">Tytuł</div>
                    <input class="title-input" name="title" type="text" placeholder="Tytuł">
                </div>
                <div id="choose-category">
                    <div class="square">Kategoria</div>
                    <input class="category-selector" name="category" type="text" placeholder="Wybierz kategorie">
                </div>
                <div id="write-description">
                    <div class="square">Opis</div>
                    <textarea class="description-input" name="description" placeholder="Napisz coś o ogłoszeniu"></textarea>
                </div>
                <div id="upload-photos">
                    <div class="square">Dodaj zdjęcie</div>
                    <input id="add-photo" type="file" name="file">
                </div>
                <div id="send-photos">
                    <button type="submit">Wyślij</button>
                </div>
            </form>
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