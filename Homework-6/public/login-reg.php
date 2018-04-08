<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

$message = "Войдите на сайт, или зарегистрируйтесь";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST["log-reg"] == "Register"){
        $username = $_POST["login"];
        $password = $_POST["password"];
        $userType = $_POST["userType"];
        $result = execute("INSERT INTO users (username, password, usertype) VALUES('{$username}','{$password}','{$userType}')");
        if($result){
            $message = "Регистрация прошла успешно";
        }else{
            $message = "Неверное имя пользователя или пароль";
        }
    }else if($_POST["log-reg"] == "Login"){
        $username = $_POST["login"];
        $password = $_POST["password"];
        $user = query("SELECT * FROM users WHERE username =  '{$username}' AND password = '{$password}'");
        getConnection(false);
        if($user){
            session_start();
            $_SESSION['user'] = $user[0]["username"];
            $_SESSION['type'] = $user[0]["usertype"];
            $message = "Вход выполнен под пользователем {$_SESSION['user']} с правами {$_SESSION['type']}";
        }else {
            $message = "Неверное имя пользователя или пароль";
        }
        
        
        
    }
    
    
}

echo render("login-reg",["message" => $message],"main");

