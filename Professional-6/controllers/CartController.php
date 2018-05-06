<?php

namespace sukhinin\app\controllers;

/**
 * Description of CartController
 *
 * @author Lex
 */
class CartController extends Controller {
    
    public function actionIndex(){
        $cartIDs = \sukhinin\app\services\Session::getInstance()->getCart();
        $cartProducts = [];
        foreach ($cartIDs as $key => $value) {
            $cartProducts[$key] = [
                'prod' => (new \sukhinin\app\models\repositories\ProductRepository())->getOne($key),
                'qtty' => $value
            ];
        }
        echo $this->render('cart', ['cartProducts' => $cartProducts]);
    }
    
    public function actionOrder(){
        // TODO: создать структуру объектов-заказов
        $orderSql = "INSERT INTO `orders` () VALUES ();";
        \sukhinin\app\services\Db::getInstance()->execute($orderSql);
        $id = \sukhinin\app\services\Db::getInstance()->lastInsertId();
        $columns = [];
        $params = [];
        $params[':id'] = $id;
        $i = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            var_dump($key);
            $columns[$i] = "(:id, :id{$i}, :qtty{$i})";
            $params[":id{$i}"] = $key;
            $params[":qtty{$i}"] = $value;
            $i++;
        }
        $columns = implode(", ", $columns);
        $sql = "INSERT INTO `orders_products` (`order_id`, `prod_id`, `prod_qtty`) VALUES {$columns};";
        /* Проверочный блок
        var_dump($sql);
        echo "<br>";
        var_dump($orderSql);
        echo "<br>";
        var_dump($params);
         */
        \sukhinin\app\services\Db::getInstance()->execute($sql, $params = []);
    }
    
    public function actionRemove(){
        $id = (new \sukhinin\app\services\Request())->getParams()['id'];
        $qtty = (new \sukhinin\app\services\Request())->getParams()['qtty'];
        \sukhinin\app\services\Session::getInstance()->removeFromCart([$id => $qtty]);
        
        $this->actionIndex();
    }
}
