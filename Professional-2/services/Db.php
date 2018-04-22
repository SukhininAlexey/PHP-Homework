<?php
namespace sukhinin\app\services;

/**
 * Description of Db
 *
 * @author Lex
 */
class Db {
    
    // TODO: улучшить или удалить
    private $name = "Test db1";
    public function getName(){
        return $this->name;
    }


    public function queryOne($sql, $params = []){
        return ["queryOne SQL={$sql}<db>"];
    }
    
    public function queryall($sql, $params = []){
        return ["queryAll SQL={$sql}<db>"];
    }
}
