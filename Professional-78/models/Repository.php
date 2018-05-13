<?php

namespace sukhinin\app\models;

/**
 * Description of Repository
 *
 * @author Lex
 */
abstract class Repository {
    
    
    protected $_db;
    
    public function __construct() {
        $this->_db = \sukhinin\app\base\App::call()->db;
    }
    
    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $result = \sukhinin\app\base\App::call()->db->queryObject($sql, [":id" => $id], $this->getEntityClass());
        $result->_existsInDb = true;
        
        // Для упрощения запроса на обновление: начало
        $this->addFields($result);
        // конец
        
        return $result;
    }
    
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $result = \sukhinin\app\base\App::call()->db->queryObject($sql, [], $this->getEntityClass());
        foreach ($result as $key => $value) {
            $result[$key]->_existsInDb = true;
            
            // Для упрощения запроса на обновление: начало
            $this->addFields($result[$key]);
            // конец
        }
        return $result;
    }
    
    public function insert(\sukhinin\app\models\DataEntity $entity){
        $tableName = $this->getTableName();
        $params = [];
        $columns = [];
        foreach ($entity as $key => $value) {
            if(mb_substr($key, 0, 1) == '_' || $value == null || $key == null){
                continue;
            }
            $params[":{$key}"] = $value;
            array_push($columns, $key);
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        \sukhinin\app\base\App::call()->db->execute($sql, $params);
        $entity->id = \sukhinin\app\base\App::call()->db->lastInsertId();
        $entity->_existsInDb = true;
        return true;
    }
    
    public function update(\sukhinin\app\models\DataEntity $entity){
        $tableName = $this->getTableName();
        $params = [];
        $pieces  = [];
        
        foreach ($entity as $key => $value) {
            // Всё, что после "||" - для упрощения запроса к базе данных
            if(mb_substr($key, 0, 1) == '_' || $entity->_fields[$key] == $entity->$key && $key != 'id'){
                continue;
            }
            $params[":{$key}"] = $value;
            array_push($pieces, "{$key}=:{$key}");
        }
        $pieces = implode(", ", $pieces);
        
        $sql = "UPDATE {$tableName} SET {$pieces} WHERE id=:id;";
        
        // Проверка запроса <начало>
        echo $sql . "<br>";
        var_dump($params);
        // <конец>
        
        return \sukhinin\app\base\App::call()->db->execute($sql, $params);
    }
    
    public function save(\sukhinin\app\models\DataEntity $entity){
        if($entity->_existsInDb){
            $this->update($entity);
        }else{
            $this->insert($entity);
        }
    }
    
    public function delete(\sukhinin\app\models\DataEntity $entity){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id`=:id ";
        return \sukhinin\app\base\App::call()->db->execute($sql, [':id' => $entity->id]);
    }
    
    // Функция - часть концепта по упрощению запроса на обновление строк в БД
    protected function addFields($obj){
        foreach ($obj as $key => $value) {
            if(mb_substr($key, 0, 1) == '_' || $key == null){
                continue;
            }
            $obj->_fields["{$key}"] = $value;
        }
    }
    
    abstract public function getTableName();
    
    abstract public function getEntityClass();
}
