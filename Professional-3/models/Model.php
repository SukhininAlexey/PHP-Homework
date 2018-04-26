<?php
namespace sukhinin\app\models;

/**
 * Description of Model
 *
 * @author Lex
 */
abstract class Model {
    
    protected $db;
    protected $className;

    protected function __construct() {
        $this->db = \sukhinin\app\services\Db::getInstance();
        $this->className = get_class($this);
    }
    
    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [":id" => $id], $this->className);
    }
    
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql, [], $this->className);
    }
    
    // TODO: удалить или улучшить
    public function testDisplay(){
        echo "Table name: " . $this->getTableName() . "<br>";
        echo "Class Name: " . $this->className . "<br>";
    }
    
    abstract public function getTableName();
}
