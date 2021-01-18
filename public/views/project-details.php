<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/details-add.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Project Details Page</title>
</head>

<body>
    <div id="container">
        <?php include('header.php'); ?>
        <div id="grid">
            <div id="title">
                <h4>Tytuł</h4>
                <h5><?= $project->getTitle(); ?></h5>
            </div>
            <div id="image">
                <img src="../public/uploads/<?= $project->getImage(); ?>" alt="zdjęcie">
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
        <?php include('footer.php'); ?>
    </div>
</body>

</html>