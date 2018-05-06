<?php

namespace sukhinin\app\controllers;

/**
 * Description of ProductController
 *
 * @author Lex
 */
class ProductController extends Controller {

    public function actionIndex(){
        $products = (new \sukhinin\app\models\repositories\ProductRepository())->getAll();
        echo $this->render('catalog', ['products' => $products]);
    }
    
    public function actionCard(){
        $id = (new \sukhinin\app\services\Request())->getParams()['id'];
        $product = (new \sukhinin\app\models\repositories\ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
    
    public function actionAdd(){
        $id = (new \sukhinin\app\services\Request())->getParams()['id'];
        $qtty = (new \sukhinin\app\services\Request())->getParams()['qtty'];
        \sukhinin\app\services\Session::getInstance()->addToCart([$id => $qtty]);
        
        $this->actionIndex();
    }
}
