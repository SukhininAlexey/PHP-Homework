<?php

namespace sukhinin\app\controllers;

/**
 * Description of ProductController
 *
 * @author Lex
 */
class ProductController extends Controller {

    public function actionIndex(){
        echo "catalog";
        $products = \sukhinin\app\models\Product::getAll();
        echo $this->render('catalog', ['products' => $products]);
    }
    
    public function actionCard(){
        $id = $_GET['id'];
        $product = \sukhinin\app\models\Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
    
    

}
