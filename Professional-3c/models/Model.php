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
    
    public function insertOne($params = []){
        $tableName = $this->getTableName();
        $sql = "INSERT INTO `{$tableName}` (";
        $sql1 = "";
        $sql2 = "";
        
        foreach ($params as $key => $value) {
            $sql1 .= "`{$key}`, ";
            $sql2 .= ":{$key}, ";
        }
        
        // Изменяем ключи
        $paramsNew = $this->changeKeys($params);
        
        $sql1 = substr($sql1, 0, -2);
        $sql2 = substr($sql2, 0, -2);
        
        $sql .= $sql1 . ") VALUES (" . $sql2 . ");";
        
        return $this->db->execute($sql, $paramsNew);
    }
    
    public function updateOne($id, $params = []){
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET ";
        
        foreach ($params as $key => $value) {
            $sql .= "`{$key}`=:{$key}, ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE id = :id;";
        
        // Изменяем ключи
        $paramsNew = $this->changeKeys($params);
        $paramsNew[':id'] = $id;
        
        return $this->db->execute($sql, $paramsNew);
    }
    
    public function deleteOne($id){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id`=:id ";
        return $this->db->execute($sql, [':id' => $id]);
        
    }


    
    // Функция добавляет ":" для всех ключей
    private function changeKeys($array){
        $arrayNew = [];
        foreach ($array as $key => $value) {
            $keyNew = ':' . $key;
            $arrayNew[$keyNew] = $array[$key];
        }
        return $arrayNew;
    }

    // TODO: удалить или улучшить
    public function testDisplay(){
        echo "Table name: " . $this->getTableName() . "<br>";
        echo "Class Name: " . $this->className . "<br>";
    }
    
    abstract public function getTableName();
}
