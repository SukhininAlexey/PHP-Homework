<?php
namespace sukhinin\app\models;

/**
 * Description of Model
 *
 * @author Lex
 */
abstract class Model {
    
    protected $db;

    protected function __construct($db) {
        $this->db = $db;
    }
    
    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }
    
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
    
    // TODO: удалить или улучшить
    public function testDisplay(){
        echo "Data base: " . $this->db->getName() . "<br>";
        echo "Table name: " . $this->getTableName() . "<br>";
    }
    
    abstract public function getTableName();
}
