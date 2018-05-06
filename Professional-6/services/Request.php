<?php

namespace sukhinin\app\services;

/**
 * Description of Request
 *
 * @author Lex
 */
class Request {
    
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $requestMethod;

    public function __construct() {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }
    
    private function parseRequest(){
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        // Приходится учитывать путь до папки public
        $pattern = "#(/PHP-Homework/Professional-2/public/)(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if(preg_match_all($pattern, $this->requestString, $matches)){
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName(){
        return $this->controllerName;
    }
    
    public function getActionName(){
        return $this->actionName;
    }
    
    public function getParams() {
        return $this->params;
    }
    
    
    public function getRequestMethod(){
        return $this->requestMethod;
    }
}
