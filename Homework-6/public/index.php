<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

session_start();
$indexMessage = "Выберите товар, чтобы увидеть детали";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $prod_id = (string)$_POST["prod_id"];
    if(isset($_SESSION['user'])){
        $query = execute("INSERT INTO cart (user, prod_id, qtty) VALUES('{$_SESSION['user']}',{$prod_id},'1')");
        $indexMessage = "Товар добавлен в корзину";
        if(!$query){
            $query = execute("UPDATE `cart` SET `qtty` = qtty + 1 WHERE `user`='{$_SESSION['user']}' and `prod_id`={$prod_id};");
            $indexMessage = "Количуество товаров данного типа увеличено на 1";
        }
        if(!$query){
            $indexMessage = "Не удалось добавить товар в корзину";
        }
    }else{
        $indexMessage = "Зарегистрируйтесь или войдите на сайт, чтобы получить доступ к корзине";
    }
}

$contentArr = query("SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName' FROM prod_table LEFT JOIN categories on prod_table.category_id = categories.id");

getConnection(false);


echo render("index",["products" => $contentArr, "message" => $indexMessage],"main");

?>

