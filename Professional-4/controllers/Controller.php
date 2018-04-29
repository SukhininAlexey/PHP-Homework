<?php

namespace sukhinin\app\controllers;

/**
 * Description of Controller
 *
 * @author Lex
 */
abstract class Controller {
    
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if(method_exists($this, $method)){
            $this->$method();
        }else{
            echo "404";
        }
    }
    
    // Функции рендера
    function render($template, $params = [], $layout = null){
        if($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);
        }else{
            return $this->renderTemplate($template, $params);
        }
    }
    
    function renderTemplate($template, $params = []){
        ob_start();
        extract($params);
        include TEMPLATES_DIR . "/{$template}.php";
        return ob_get_clean();
    }
}
