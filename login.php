<?php
require "includes/db.php";
session_start();
$data=$_POST;
$inf=array();
$inf[1]=$data['login'];
$inf[2]=$data['password'];
$check=true;
if (isset($data['loginin'])) {
    $data['login'] = trim($data['login']);
    $_SESSION['login'] = $data['login'];
    $_SESSION['password'] = $data['password'];
    $errors['login'] = "";
    $errors['password'] = "";
    if ($data['login'] == '') {
        $check=false;
        $errors['login'] = 'Введите логин';
    } else if (!checkLogin($data['login'])) {
        $check=false;
        $errors['login'] = 'Пользователь с таким логином не найден';
    }
    if ($data['password'] == "") {
        $check=false;
        $errors['password'] = "Введите пароль";
    } else if (!checkPassword($inf)) {
        $check=false;
        $errors['password'] = "Неверный пароль";
    }
    $inf=array();
    if ($check) {
        echo "<h1>Авторизировался</h1>";
        $_SESSION['logged_user']=$data['login'];
        echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=loginok.php">';
    }
}
?>
<!DOCTYPE html>
<html
    lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Облачная библиотека</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<nav class="white lighten-1" role="navigation">
    <div class="nav-wrapper container "><div><a id="logo-container" href="index.php" class="brand-logo logo"><img class="logo" src="img/Logo_m.png"></a>
            <ul class="right">
                <li><a class="waves-effect waves-light btn " href="signup.php">Зарегестрироваться</a></li>
            </ul>
        </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <form class="col s12 m9 l9 offset-l3 offset-m3" action="/login.php" method="post">
            <div class="row">
                <h6 class="maincolor col s12">Введите логин или e-mail:</h6>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix maincolor">account_circle</i>
                    <input placeholder="Введите логин или email" id="first_name" type="text" class="validate" name="login" value="<?=$_SESSION['login']?>">
                    <?php if ($errors['login']!='') echo '<span class="error">'.$errors['login']."</span>"?>
                </div>
            </div>
            <div class="row">
                <h6 class="maincolor col s12">Введите пароль</h6>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix maincolor">lock</i>
                    <input placeholder="Введите пароль" id="password" type="password" class="validate" name="password">
                    <?php if ($errors['password']!='') echo '<span class="error">'.$errors['password']."</span>"?>
                </div>
            </div>
            <button  class="btn waves-effect waves-light login" type="submit" name="loginin"><span class="elcolor">войти</span>
            </button>
        </form>
        </div>
    </div>
</body>
