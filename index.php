<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Облачная библиотека</title>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<nav class="white lighten-2">
    <div class="nav-wrapper container">
        <a href="#!" class="brand-logo"><img class="logo" src="img/Logo_m.png"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons maincolor">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="btn waves-light waves-effect" href="login.php">Войти</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo" href="download.php">
            <li><a href="login.php">Войти</a></li>
        </ul>
    </div>
</nav>

<div class="section no-pad-bot info" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center black-text">Облачная библиотека</h1>
        <div class="row center">
            <h5 class="header col s12 light">Ваши книги. Всегда, везде, с вами.</h5>
        </div>
        <div class="row center">
            <a href="signup.php" id="download-button" class="btn-large waves-effect waves-light ">Регистрация</a>
        </div>
        <br><br>
    </div>
</div>
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center maincolor "><i class="material-icons maincolor">autorenew</i></h2>
                    <h5 class="center">Синхронизация</h5>

                    <p class="light">Синхронизация вашего прогресса. Всегда начинайте читать с того места, на котором закончили. На любом устройстве.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center maincolor"><i class="material-icons maincolor">devices</i></h2>
                    <h5 class="center">На любом устройстве</h5>

                    <p class="light">Читайте свои любимые книги журналы на любом своем устройстве.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center maincolor"><i class="material-icons maincolor">settings_system_daydream</i></h2>
                    <h5 class="center">Облако</h5>

                    <p class="light">Храните свои книги в облаке для беспрепятственного доступа к ним с любого устройства.</p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="section">

    </div>
</div>
</body>
</html>