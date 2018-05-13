<?php

namespace sukhinin\app\controllers;

/**
 * Description of ProductController
 *
 * @author Lex
 */
class ExceptionController extends Controller {

    public function actionIndex(){
        echo $this->render('exception');
    }
}
