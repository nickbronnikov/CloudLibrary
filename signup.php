<?php
    require "includes/db.php";
    require "includes/filechange.php";
    $data=$_POST;
    if(isset($data["signup"])){
        $login=htmlspecialchars(trim($_POST["login"]));
        $email=htmlspecialchars(trim($_POST["email"]));
        $password=htmlspecialchars(trim($_POST["password"]));
        $password2=htmlspecialchars(trim($_POST["password2"]));
        $_SESSION["login"]=trim($data['login']);
        $_SESSION['email']=trim($data['email']);
        $_SESSION['password']=$password;
        $_SESSION['password2']=$password2;
        $errors=array();
        $errors['login']="";
        $errors['email']="";
        $errors['password']="";
        $errors['password2']="";
        $checkerrors=true;
        if (trim($data['login'])==''){
            $checkerrors=false;
            $errors['login']="Введите логин";
        } else{
            if (checklogin(trim($data['login']))){
                $checkerrors=false;
                $errors['login']="Пользователь с таким логином уже зарегестрирован";
            }
        }
        if (trim($data['email'])==''){
            $checkerrors=false;
            $errors['email']="Введите e-mail";
        } else{
            if (checkMail(trim($data['email']))){
                $checkerrors=false;
                $errors['email']="Пользователь с таким e-mail уже зарегестрирован";
            }
        }
        if ($data['password']=='')
        {
            $checkerrors=false;
            $errors['password']="Введите пароль";
        } else
        {
            if (strlen($data['password']) < 5) {
                $checkerrors=false;
                $errors['password'] = "Пароль должен быть длинной не менее пяти символов";
            }
        }
        if (strlen($data['password']) >= 5 && $data['password2']!=$data['password']){
            $checkerrors=false;
            $errors['password2']="Пароли не совпадают";
        }
        if ($checkerrors){
            $time=time();
            $password=password_hash($password,PASSWORD_DEFAULT);
            $table_name='users';
            $fields=array('login', 'email', 'password', 'join_date');
            $data=array($login, $email, $password,$time);
            $success=B::inBase($table_name,$fields,$data);
            unset($_SESSION);
            if ($success) {
                mkdir("users_files/".rus2translit($login),0777);
                echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=success.php">';
            }
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
                <li><a class="waves-effect waves-light btn " href="login.php">Войти</a></li>
            </ul>
        </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <form class="col s12" action="/signup.php" method="post">
            <div class="row">
                <h6 class="maincolor col s12">Введите логин:</h6>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix maincolor">account_circle</i>
                            <input placeholder="Введите логин" id="first_name" type="text" class="validate" name="login" value="<?=$_SESSION["login"]?>">
                            <?php if ($errors['login']!='') echo '<span class="error">'.$errors['login']."</span>"?>
                        </div>
            </div>
            <div class="row">
                <h6 class="maincolor col s12">Введите e-mail:</h6>

                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix maincolor">email</i>
                            <input placeholder="Введите e-mail" id="e-mail" type="text" class="validate" name="email" value="<?=$_SESSION['email']?>">
                            <?php if ($errors['email']!='') echo '<span class="error">'.$errors['email']."</span>"?>
                        </div>
            </div>
            <div class="row">
                <h6 class="maincolor col s12">Введите пароль</h6>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix maincolor">lock</i>
                    <input placeholder="Введите пароль" id="password" type="password" class="validate" name="password" value="<?=$_SESSION['password']?>">
                    <?php if ($errors['password']!='') echo '<span class="error">'.$errors['password']."</span>"?>
                </div>
            </div>
            <div class="row">
                <h6 class="maincolor col s12">Введите пароль еще раз</h6>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix maincolor">lock</i>
                    <input placeholder="Введите пароль еще раз" id="password2" type="password" class="validate" name="password2" value="<?=$_SESSION['password2']?>">
                    <?php if ($errors['password2']!='') echo '<span class="error">'.$errors['password2']."</span>"?>
                </div>
            </div>
            <button  class="btn waves-effect waves-light " type="submit" name="signup"><span class="elcolor">регистрация</span>
                <i class="material-icons right elcolor">send</i>
            </button>
            </form>
</body>