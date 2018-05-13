<?php

namespace sukhinin\app\models;

/**
 * Description of Cart
 *
 * @author Lex
 */
class Cart {
    
    public function addToCart(array $params = []){
        $cartList = $this->getCart();
        foreach ($params as $key => $value) {
            if(array_key_exists($key, $cartList) && $value >= 1){
                $cartList[$key] += $value;
            }else{
                $cartList[$key] = $value;
            }
        }
        \sukhinin\app\base\App::call()->session->set("cart", $cartList);
    }
    
    public function removeFromCart(array $params = []){
        // В параметрах ожидается массив ID => количество
        
        $cartList = $this->getCart();
        foreach ($params as $key => $value) {
            if($cartList[$key] > $params[$key]){
                $cartList[$key] -= $value;
            }else{
                unset($cartList[$key]);
            }
        }
        \sukhinin\app\base\App::call()->session->set("cart", $cartList);
    }
    
    public function getCart(){
        if(is_null(\sukhinin\app\base\App::call()->session->get("cart"))){
            \sukhinin\app\base\App::call()->session->set("cart", []);
        }
        $cart = \sukhinin\app\base\App::call()->session->get("cart");
        return $cart;
    }
    
}
