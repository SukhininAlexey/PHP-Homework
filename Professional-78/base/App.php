<?php

namespace sukhinin\app\base;

/**
 * Description of App
 *
 * @author Lex
 */
class App {
    use \sukhinin\app\traits\TSingleton;
    
    public $config;
    
    private $components;
    private $repositories;


    private $controller;
    private $action;


    public function call() {
        return static::getInstance();
    }
    
    public function run($config){
        $this->config = $config;
        $this->components = new Storage();
        $this->repositories = new RepositoryStorage();
        try {
            $this->runController();
        } catch (\Exception $exc) {
            /* Способ 1:
            $controller = new \sukhinin\app\controllers\ExceptionController(new \sukhinin\app\services\TemplateRenderer());
            $controller->runAction();
             */
            
            // Способ 2:
            header("Location: http://localhost/PHP-Homework/Professional-2/public/exception/");
        }

        
    }
    
    public function createComponent($name) {
        if(isset($this->config["components"][$name])){
            $params = $this->config["components"][$name];
            $class = $params["class"];
            if(class_exists($class)){
                unset($params["class"]);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
            
        }
        return null;
    }
    
    public function createRepository($name) {
        $className = $this->config["reposirories_namespace"] . $name;
        if(class_exists($className)){
            return new $className();
        }
        return null;
    }
    
    public function runController() {    
        // TODO: вкоючить сессии, проверить авторизацию
        $this->controller = $this->request->getControllerName() ?: "product";
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config["controllers_namespace"] . ucfirst($this->controller) . "Controller";

        if(class_exists($controllerClass)){
            $controller = new $controllerClass(new \sukhinin\app\services\TemplateRenderer());
            $controller->runAction($this->action);
        }else{
            throw new \Exception("Invalid request from App");
        }
    }
    
    public function __get($name) {
        $inst = $this->components->get($name);
        if(!$inst){
            $inst = $this->repositories->get($name);
        }
        return $inst;
    }
    
    
}

