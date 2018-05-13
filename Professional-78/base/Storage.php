<?php

namespace sukhinin\app\base;

/**
 * Description of Storage
 *
 * @author Lex
 */
class Storage {
    
    private $items = [];
    
    public function set($key, $object) {
        $this->items[$key] = $object;
    }
    
    public function get($key) {
        if(!isset($this->items[$key])){
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }
}
