<!DOCTYPE html>

<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public/css/login-register.css">
    <script src="https://kit.fontawesome.com/d4fac2996f.js" crossorigin="anonymous"></script>
    <title>Login page</title>
</head>

<body>
    <div id="container">
        <div id="logo-container">
            <img id="login-logo" src="public/img/logo.PNG">
        </div>
        
        <div id="form">
            <form id="form-content" action="login" method="post">
                <div id="form-title-container">
                    <h4 id="form-title">Logowanie</h4>
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
                <h5 class="field-title">Hasło</h5>
                <div class="form-field">
                    <i class="fas fa-lock"></i>
                    <input class="input-field" name="password" type="password" placeholder="Hasło">
                </div>
                <div class="buttons-container">
                    <a href="register">
                        <button class="left-button" type="submit" name="left-button">Załóż konto</button>
                    </a>
                    <button class="right-button" type="submit" name="right-button">Zaloguj się</button>
                </div>
            </form>
        </form>
    </div>
</body>

</html>