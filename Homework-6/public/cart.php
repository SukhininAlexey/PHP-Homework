<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

session_start();
$cartMessage = "Ваша корзина";
$contentArr = [];

if(isset($_SESSION['user'])){

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = (int)$_POST["prod_id"];
        $query = execute("DELETE FROM `cart` WHERE `user`='{$_SESSION['user']}' and `prod_id`='{$id}'");
    }
    $contentArr = query("SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName', cart.user, cart.qtty FROM cart LEFT JOIN prod_table on cart.prod_id = prod_table.id LEFT JOIN categories on prod_table.category_id = categories.id WHERE cart.user = '{$_SESSION['user']}'");
    getConnection(false);
}else{
    $cartMessage = "Зарегистрируйтесь или войдите на сайт, чтобы получить доступ к корзине!";
}


echo render("cart",["products" => $contentArr, "message" => $cartMessage],"main");

?>

