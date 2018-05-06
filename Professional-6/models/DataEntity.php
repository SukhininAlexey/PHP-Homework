<?php
namespace sukhinin\app\models;

/**
 * Description of Model
 *
 * @author Lex
 */
abstract class DataEntity extends Model {
    
    public $_existsInDb = false;
    public $_fields = [];
    
    
    
    //protected $_db; // TODO: удалить, как избавлюсь от всех обращений
    
    /* перенесено
    protected function __construct() {
        $this->_db = \sukhinin\app\services\Db::getInstance();
    }
    
    
    /* Перенесено
    public static function getOne($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $result = \sukhinin\app\services\Db::getInstance()->queryObject($sql, [":id" => $id], get_called_class());
        $result->_existsInDb = true;
        
        // Для упрощения запроса на обновление: начало
        static::addFields($result);
        // конец
        
        return $result;
    }
    
    public static function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $result = \sukhinin\app\services\Db::getInstance()->queryObject($sql, [], get_called_class());
        foreach ($result as $key => $value) {
            $result[$key]->_existsInDb = true;
            
            // Для упрощения запроса на обновление: начало
            static::addFields($result[$key]);
            // конец
        }
        return $result;
    }
    
    
    public function insert(){
        $tableName = static::getTableName();
        $params = [];
        $columns = [];
        foreach ($this as $key => $value) {
            if(mb_substr($key, 0, 1) == '_' || $key == null){
                continue;
            }
            $params[":{$key}"] = $value;
            array_push($columns, $key);
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        \sukhinin\app\services\Db::getInstance()->execute($sql, $params);
        $this->id = \sukhinin\app\services\Db::getInstance()->lastInsertId();
        return true;
    }
    
    public function update(){
        $tableName = static::getTableName();
        $params = [];
        $pieces  = [];
        
        foreach ($this as $key => $value) {
            // Всё, что после "||" - для упрощения запроса к базе данных
            if(mb_substr($key, 0, 1) == '_' || $this->_fields[$key] == $this->$key && $key != 'id'){
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
        
        return \sukhinin\app\services\Db::getInstance()->execute($sql, $params);
    }
    
    public function save(){
        if($this->_existsInDb){
            $this->update();
        }else{
            $this->insert();
        }
    }
    
    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE `id`=:id ";
        return $this->_db->execute($sql, [':id' => $this->id]);
    }
    
    
    // Функция - часть концепта по упрощению запроса на обновление строк в БД
    protected static function addFields($obj){
        foreach ($obj as $key => $value) {
            if(mb_substr($key, 0, 1) == '_' || $key == null){
                continue;
            }
            $obj->_fields["{$key}"] = $value;
        }
    }
     */

    // TODO: удалить или улучшить
    /*
    public function testDisplay(){
        echo "Table name: " . $this->getTableName() . "<br>";
    }
    
    
    /*перенесено
    abstract public static function getTableName();
     */

    
}
