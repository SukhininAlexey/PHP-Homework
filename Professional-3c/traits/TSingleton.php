<?php

namespace sukhinin\app\traits;

/**
 *
 * @author Lex
 */
trait TSingleton {
    private static $instance = null;
    
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new self();
        }
        return static::$instance;
    }
}
