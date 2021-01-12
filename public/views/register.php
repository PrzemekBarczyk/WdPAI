<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/public/css/login-register.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Register Page</title>
</head>

<body>
    <div id="container">
        <div id="logo-container">
            <img id="register-logo" src="/public/img/logo.PNG" alt="logo">
        </div>
        <form id="form" action="register" method="post">
            <div id="form-title-container">
                <h4 id="form-title">Rejestracja</h4>
            </div>
            <div class="messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>
            <h5 class="field-title">Email</h5>
            <div class="form-field">
                <i class="fas fa-envelope"></i>
                <input class="input-field" name="email" type="text" placeholder="Email">
            </div>
            <h5 class="field-title">Numer telefonu</h5>
            <div class="form-field">
                <i class="fas fa-mobile-alt"></i>
                <input class="input-field" name="phone" type="text" placeholder="Nr telefonu">
            </div>
            <h5 class="field-title">Nazwa miejscowości</h5>
            <div class="form-field">
                <i class="fas fa-map-marked-alt"></i>
                <input class="input-field" name="location" type="text" placeholder="Nazwa miejscowości">
            </div>
            <h5 class="field-title">Hasło</h5>
            <div class="form-field">
                <i class="fas fa-lock"></i>
                <input class="input-field" name="password" type="password" placeholder="Hasło">
            </div>
            <div class="buttons-container">
                <a href="">
                    <button class="right-button">Zarejestruj się</button>
                </a>
            </div>
        </form>
    </div>
</body>

</html>