<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";


session_start();
$indexMessage = "Выберите товар, чтобы увидеть детали";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $prod_id = (string)$_POST["id"];
    $prod_qtty = $_POST["qtty"];
    if(isset($_SESSION['user'])){
        $query = execute("INSERT INTO cart (user, prod_id, qtty) VALUES('{$_SESSION['user']}',{$prod_id},'{$prod_qtty}')");
        if($query){
            $result = json_encode(["result" => "Товар добавлен в корзину в количестве: {$prod_qtty}"]);
        }
        if(!$query){
            $query = execute("UPDATE `cart` SET `qtty` = qtty + {$prod_qtty} WHERE `user`='{$_SESSION['user']}' and `prod_id`={$prod_id};");
            $result =  json_encode(["result" => "Количество товаров данного типа увеличено на {$prod_qtty}"]);
        }
        if(!$query){
            $result =  json_encode(["result" => "Не удалось добавить товар в корзину"]);
        }
    }else{
        $result =  json_encode(["result" => "Зарегистрируйтесь или войдите на сайт, чтобы получить доступ к корзине"]);
    }
    echo $result;
    exit;
}

$contentArr = query("SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName' FROM prod_table LEFT JOIN categories on prod_table.category_id = categories.id");

getConnection(false);


echo render("index",["products" => $contentArr, "message" => $indexMessage],"main");

?>

