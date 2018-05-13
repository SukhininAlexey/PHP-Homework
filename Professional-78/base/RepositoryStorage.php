<?php

namespace sukhinin\app\base;

/**
 * Description of Storage
 *
 * @author Lex
 */
class RepositoryStorage {
    
    private $items = [];
    
    public function set($key, $object) {
        $this->items[$key] = $object;
    }
    
    public function get($key) {
        
        if(!isset($this->items[$key])){
            $this->items[$key] = App::call()->createRepository($key);
        }
        return $this->items[$key];
    }
}
