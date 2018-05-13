<?php

namespace sukhinin\app\models\repositories;

/**
 * Description of ProductRepository
 *
 * @author Lex
 */
class OrderRepository extends \sukhinin\app\models\Repository {
    
    public function getTableName() {
        return 'orders';
    }
    
    public function getEntityClass() {
        return \sukhinin\app\models\Order::class;
    }
    
    public function addOrder(\sukhinin\app\models\Order $order){
        $this->insert($order);
        $id = $order->id;
        
        $orderList = $order->_orderList;
        $columns = [];
        $params = [];
        $params[':id'] = $id;
        $i = 0;
        foreach ($orderList as $key => $value) {
            $columns[$i] = "(:id, :id{$i}, :qtty{$i})";
            $params[":id{$i}"] = $key;
            $params[":qtty{$i}"] = $value;
            $i++;
        }
        $columns = implode(", ", $columns);
        $sql = "INSERT INTO `orders_products` (`order_id`, `prod_id`, `prod_qtty`) VALUES {$columns};";

        \sukhinin\app\base\App::call()->db->execute($sql, $params);
    }
}
