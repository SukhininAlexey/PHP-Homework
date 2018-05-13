<?php

namespace sukhinin\app\controllers;

/**
 * Description of CartController
 *
 * @author Lex
 */
class CartController extends Controller {
    
    public function actionIndex(){
        $cartIDs = \sukhinin\app\base\App::call()->cart->getCart();
        $cartProducts = [];
        foreach ($cartIDs as $key => $value) {
            $cartProducts[$key] = [
                'prod' => \sukhinin\app\base\App::call()->ProductRepository->getOne($key),
                'qtty' => $value
            ];
        }
        echo $this->render('cart', ['cartProducts' => $cartProducts]);
    }
    
    public function actionOrder(){
        $orderList = \sukhinin\app\base\App::call()->cart->getCart();
        $order = new \sukhinin\app\models\Order(null, $orderList);
        var_dump($order);
        \sukhinin\app\base\App::call()->OrderRepository->addOrder($order);
        var_dump($order);
        $this->actionIndex();
    }
    
    public function actionRemove(){
        $id = \sukhinin\app\base\App::call()->request->getParams()['id'];
        $qtty = \sukhinin\app\base\App::call()->request->getParams()['qtty'];
        
        \sukhinin\app\base\App::call()->cart->removeFromCart([$id => $qtty]);
        
        $this->actionIndex();
    }
}
