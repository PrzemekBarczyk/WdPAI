<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public/css/header-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/details-add.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer-bar.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Add project page</title>
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo-container">
                <a href="allProjects">
                    <img src="public/img/logo.PNG">
                </a>
            </div>
            <div id="search-bar">
                <input class="input-field" name="search" type="text" placeholder="Wyszukaj...">
                <i class="fas fa-search"></i>
            </div>
            <a href="addProject">
                <button id="button-add">
                    <i class="far fa-plus-square"></i>
                    Dodaj ogłoszenie
                </button>
            </a>
            <a href="myProjects">
                <button id="button-my">Moje ogłoszenia</button>
            </a>
            <a href="">
                <button id="button-logout">Wyloguj</button>
            </a>
        </div>
        <div id="content">
            <form action="addProject" method="POST" ENCTYPE="multipart/form-data">
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
                    <textarea class="description-input" placeholder="Napisz coś o ogłoszeniu"></textarea>
                </div>
                <div id="upload-photos">
                    <div class="square">Dodaj zdjęcia</div>
                    <div id="photos">
                        <label class="photo">
                            <input type="file" name="file">
                            <img class="photo" src="public/img/temp/img.PNG">
                        </label>
                        <label class="photo">
                            <input type="file" name="file2">
                            <img class="photo" src="public/img/temp/img.PNG">
                        </label>
                        <label class="photo">
                            <input type="file" name="file3">
                            <img class="photo" src="public/img/temp/img.PNG">
                        </label>
                    </div>
                </div>
                <div id="submit">
                    <button type="submit">
                        <div class="square">Wyślij</div>
                    </button>
                </div>
            </form>
        </div>
        <div id="footer-bar">
            <a href="myProjects">
                <button id="footer-button-my">
                    <i class="fas fa-comment-alt"></i>
                    Moje ogłoszenia
                </button>
            </a>
            <a href="addProject">
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