<?php
/**
 * Description of Product
 *
 * @author Lex
 */
namespace sukhinin\app\models;

class Product extends DataEntity {
    public $id;
    public $name;
    public $description;
    public $price;
    
    public function __construct($id = null, $name = null, $description = null, $price = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /* Перенесено
    public static function getTableName() {
        return 'products';
    }
     */
    
    // TODO: удалить или дополнить
    public function testDisplay() {
        echo "Procuct name: " . $this->name . "<br>";
        parent::testDisplay();
    }
}
