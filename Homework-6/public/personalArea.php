<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST["session"] == "logout"){
        session_destroy();
    }
}

if(isset($_SESSION['user']) && isset($_SESSION['type'])){
    $message = "{$_SESSION['user']}, добро пожаловать в личный кабинет!";
}else{
    $message = "Пожалуйста, авторизуйтесь прежде, чем пройти в личный кабинет";
}

echo render("personalArea",["message" => $message],"main");
