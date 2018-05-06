<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace sukhinin\app\services;

/**
 * Description of Session
 *
 * @author Lex
 */
class Session {
    use \sukhinin\app\traits\TSingleton;
    
    public function sessionStart(){
        session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
    }
    
    public function addToCart(array $params = []){
        // В параметрах ожидается массив ID => количество
        foreach ($params as $key => $value) {
            if(array_key_exists($key, $_SESSION['cart'])){
                $_SESSION['cart'][$key] += $value;
            }else{
                $_SESSION['cart'][$key] = $value;
            }
        }
    }
    
    public function removeFromCart(array $params = []){
        // В параметрах ожидается массив ID => количество
        foreach ($params as $key => $value) {
            if($_SESSION['cart'][$key] > $params[$key]){
                $_SESSION['cart'][$key] -= $value;
            }else{
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    
    public function getCart(){
        return $_SESSION['cart'];
    }
}
