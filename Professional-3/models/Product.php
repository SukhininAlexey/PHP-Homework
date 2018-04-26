<?php
/**
 * Description of Product
 *
 * @author Lex
 */
namespace sukhinin\app\models;

class Product extends Model {
    public $id;
    public $name;
    public $price;
    public $description;
    
    public function __construct($name) {
        parent::__construct(); // необходимо обратиться к конструктору абстрактного класса. Иначе ахтунг! 
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
