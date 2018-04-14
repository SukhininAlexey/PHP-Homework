<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

session_start();
$cartMessage = "Ваша корзина";
$contentArr = [];

if(isset($_SESSION['user'])){

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if($_POST['action'] == 'remove'){
            $id = (int)$_POST["id"];
            $qtty = (int)$_POST["qtty"];
            $query = query("SELECT cart.qtty FROM cart WHERE cart.user = '{$_SESSION['user']}' and `prod_id`='{$id}'");
            $oldQtty = $query[0]['qtty'];
            if($qtty < $oldQtty){
                // Изменение
                $query = execute("UPDATE `cart` SET `qtty` = qtty - {$qtty} WHERE `user`='{$_SESSION['user']}' and `prod_id`={$id};");
                $result = json_encode(["result" => "Количество единиц товара уменьшено на {$qtty}", "qtty" => ($oldQtty - $qtty)]);
            }else{
                // Удаление
                $query = execute("DELETE FROM `cart` WHERE `user`='{$_SESSION['user']}' and `prod_id`='{$id}'");
                $result = json_encode(["result" => "Товар удален из корзины", "qtty" => 0]);
            }
            getConnection(false);
            
        }else if($_POST['action'] == 'order'){
            execute("INSERT INTO orders (state) VALUES('in process')");
            $order_id = query("SELECT last_insert_id()")[0]["last_insert_id()"];
            $cart = query("SELECT * FROM cart WHERE cart.user = '{$_SESSION['user']}'");
            $orderRequest = "INSERT INTO ordered_products (order_user, prod_id, prod_qtty, order_number) VALUES";
            
            foreach ($cart as $key => $prod) {
                $orderRequest .= " ('{$prod['user']}', {$prod['prod_id']}, {$prod['qtty']}, $order_id),";
            }
            $orderRequest = substr($orderRequest, 0, -1); // удаляю последнюю запятую
            $orderRequest .= ";"; // Добавляю ; в конце
            $query = execute($orderRequest); // Запускаю запрос
            
            if($query){
                $result = json_encode(["result" => "Заказ размещен"]);
            }else{
                $result = json_encode(["result" => "Произошла ошибка при размещении заказа"]);
            }
            getConnection(false);
        }
        
        echo $result; exit;
    }
    $contentArr = query("SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName', cart.user, cart.qtty FROM cart LEFT JOIN prod_table on cart.prod_id = prod_table.id LEFT JOIN categories on prod_table.category_id = categories.id WHERE cart.user = '{$_SESSION['user']}'");
    getConnection(false);
}else{
    $cartMessage = "Зарегистрируйтесь или войдите на сайт, чтобы получить доступ к корзине!";
}


echo render("cart",["products" => $contentArr, "message" => $cartMessage],"main");

?>

