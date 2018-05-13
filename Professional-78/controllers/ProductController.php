<?php

namespace sukhinin\app\controllers;

/**
 * Description of ProductController
 *
 * @author Lex
 */
class ProductController extends Controller {

    public function actionIndex(){
        $products = \sukhinin\app\base\App::call()->ProductRepository->getAll();
        echo $this->render('catalog', ['products' => $products]);
    }
    
    public function actionCard(){
        
        if(isset(\sukhinin\app\base\App::call()->request->getParams()['id'])){
            $id = \sukhinin\app\base\App::call()->request->getParams()['id'];
        }else{
            throw new \Exception("Invalid request from ProductController");
        }
        
        $product = \sukhinin\app\base\App::call()->ProductRepository->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
    
    public function actionAdd(){
        $id = \sukhinin\app\base\App::call()->request->getParams()['id'];
        $qtty = \sukhinin\app\base\App::call()->request->getParams()['qtty'];
        
        \sukhinin\app\base\App::call()->cart->addToCart([$id => $qtty]);
        
        $this->actionIndex();
    }
}
