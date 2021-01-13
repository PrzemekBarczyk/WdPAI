<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/details-add.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Add project page</title>
</head>

<body>
    <div id="container">
        <?php include('header.php'); ?>
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
        <?php include('footer.php'); ?>
    </div>
</body>

</html>