<?php
/**
 * Description of Product
 *
 * @author Lex
 */
namespace sukhinin\app\models;

class Product extends Model {
    private $id;
    private $name;
    private $price;
    
    // TODO: удалить или дополнить
    public function __construct($name, \sukhinin\app\services\Db $db) {
        parent::__construct($db); // необходимо обратиться к пользовательскому конструктору абстрактного класса. Иначе ахтунг! 
        $this->name = $name;
    }

    public function getTableName() {
        return 'products';
    }
    
    // TODO: удалить или дополнить
    public function testDisplay() {
        echo "Procuct name: " . $this->name . "<br>";
        parent::testDisplay();
    }
}
