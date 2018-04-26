<?php
namespace sukhinin\app\services;

/**
 * Description of Db
 *
 * @author Lex
 */
class Db {
    
    use \sukhinin\app\traits\TSingleton;
    
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'php2shop',
        'charset' => 'utf8'
    ];
    
    private $conn = null;
    
    private function getConnection(){
        if(is_null($this->conn)){
            $this->conn = new \PDO(
                    $this->prepareDsnString(), 
                    $this->config['login'], 
                    $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->conn;
    }
    
    
    // Работает только при реализации TSingleton: только один объект Db, в него можно получить доступ из статики и затереть поле
    public static function closeConnection(){
        static::$instance->conn = null; // Затираем единственную ссылку на класс, чтобы она была удалена
        return true;
    }

    

    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }
    
    public function execute($sql, $params = []) {
        $this->query($sql, $params);
        return true; // подумать над тем, что стоит вернуть
        
    }

    public function queryOne($sql, $params = [], $className = NULL){
        return $this->queryAll($sql, $params, $className)[0];
    }
    
    public function queryAll($sql, $params = [], $className = NULL){
        if(is_null($className)){
            return $this->query($sql, $params)->fetchAll();
        }else{
            return $this->query($sql, $params)->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $className, ["", "", ""]); // TODO: очень крепко подумать об этом
        }
    }
    
    private function prepareDsnString(){
        return sprintf("%s:dbname=%s;host=%s;charset=%s",
                $this->config['driver'],
                $this->config['database'],
                $this->config['host'],
                $this->config['charset']
        );
    }
}
