<?php
/**
 * Description of Product
 *
 * @author Lex
 */
namespace sukhinin\app\models;

class Order extends DataEntity {
    public $id;
    public $_orderList = [];


    public function __construct($id = null, array $orderList = null) {
        $this->id = $id;
        $this->_orderList = $orderList;
    }


}
