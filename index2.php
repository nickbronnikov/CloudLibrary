<?php
require "includes/db.php";
function checkLogin2($login){
    $mysqli= new mysqli("localhost","mysql","mysql","Library");
    $mysqli->query("SET NAMES 'utf8'");
    $res = $mysqli->query ("SELECT * FROM `users` WHERE `login`='$login'");
    $mysqli->close();
    if ($res->num_rows) return true; else return false;
}
$mysqli= new mysqli("localhost","mysql","mysql","Library");
$mysqli->query("SET NAMES 'utf8'");
$inf=array();
$inf[1]='mark.watney';
$inf[2]='martian';
$res = $mysqli->query ("SELECT * FROM `users` WHERE `test`='1'");
$mysqli->close();
echo $_SESSION['logged_user']."<br><h2>Круто, ты авторизировался!</h2>";

?>
<a class="waves-effect waves-light btn" href="/logout.php">Выйти</a>
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