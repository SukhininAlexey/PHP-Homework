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
    private $renderer;
    
    public function __construct(\sukhinin\app\interfaces\IRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if(method_exists($this, $method)){
            $this->$method();
        }else{
            throw new \Exception("Invalid request from Controller");
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
        return $this->renderer->render($template, $params);
    }
}
