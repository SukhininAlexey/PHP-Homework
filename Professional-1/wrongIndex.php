<?php
header('Content-Type: text/html; charset=utf-8');

class Account{
    
    protected $userName;
    protected $password;
    protected static $count = 0;
    protected $id;
    protected $accessLevel;
    
    protected function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }
    
    protected function display(){
        echo "Пользователь: {$this->userName}; пароль: {$this->password}; порядковый номер: {$this->id}";
    }
}

class Admin extends Account{
    
    public function __construct($userName, $password) {
        parent::__construct($userName, $password);
        $this->accessLevel = "admin";
        self::$count++;
        $this->id = self::$count;
    }
    
    public function display() {
        parent::display();
        echo "; уровень доступа: {$this->accessLevel}<br>";
    }
}

class User extends Account{
    
    private $goods = [];
    
    public function __construct($userName, $password) {
        parent::__construct($userName, $password);
        $this->accessLevel = "user";
        self::$count++;
        $this->id = self::$count;
    }
    
    public function display() {
        parent::display();
        echo "; уровень доступа: {$this->accessLevel}<br>";
        $this->showProducts();
    }
    
    public function addProduct(Product $product){
        array_push($this->goods, $product);
    }
    
    public function showProducts(){
        echo "<ul> Товары пользовтеля {$this->userName}";
        $total = 0;
        ob_start();
        foreach ($this->goods as $key => $value) {
            echo "<li>";
            $value->display();
            echo "</li>";
            $total += $value->getPrice();
        }
        echo "</ul>";
        $string = ob_get_clean();
        echo " на сумму: {$total}";
        echo $string;
    }
}

class Product{
    private $name;
    private $price;
    private static $count = 0;
    private $id;
    
    public function getPrice(){
        return $this->price;
    }

        public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
        self::$count++;
        $this->id = self::$count;
    }
    
    public function display(){
        echo "Товар ID {$this->id}; название: {$this->name}; цена: {$this->price}<br>";
    }
}

// Создаем товары
$prod1 = new Product("Суперхренорезка", 100500);
$prod2 = new Product("Реактивный лом", 282);

// Создаем пользователей
$admin = new Admin("Вася", "123");
$user = new User("Коля", "321");

// Добавляем товары пользоателю Коля
$user->addProduct($prod1);
$user->addProduct($prod2);

// Выводим обоих пользователей
$admin->display();
$user->display();

