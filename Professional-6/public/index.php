<?php
header('Content-Type: text/html; charset=utf-8');

include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/services/Autoloader.php"; // класс Autoloader

// Подключение twig начало
include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/vendor/autoload.php"; // Автозагрузчик composer'а
// Подключение twig конец

spl_autoload_register([new \sukhinin\app\services\Autoloader(), 'loadClass']); // Стек функций по добавлению файлов с классами

// Начало сессии
\sukhinin\app\services\Session::getInstance()->sessionStart();


$request = new \sukhinin\app\services\Request();
$controllerName = $request->getControllerName() ?: "product";
$actionName = $request->getActionName();

$controllerClass = "sukhinin\app\controllers\\". ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(new \sukhinin\app\services\TemplateRenderer());
    $controller->runAction($actionName);
}



//\sukhinin\app\services\Session::getInstance()->addToCart([1 => 1, 2 => 1, 3 => 1]);

// Тестим, что получилось:
//$prod = new sukhinin\app\models\Product(null, "Тест333", "Описание333", 333);
//$prod = (new sukhinin\app\models\repositories\ProductRepository())->getOne(227);
//$prod->description = 'опсиание 333';
//(new sukhinin\app\models\repositories\ProductRepository())->delete($prod);
//var_dump($prod->id);
//$prod->price = 275;
//var_dump($prod->id);
//var_dump(sukhinin\app\models\Product::getOne(2)->name);
//echo "<br>";
//var_dump(sukhinin\app\models\Product::getAll()[3]->name);
//$prod1 = sukhinin\app\models\Product::getOne(17);
//$prod->name = "Прянички";
//$prod->description = "Тульские - самые вкусные";
//$prod->save();
//var_dump($prod->name);
//var_dump($prod->deleteOne(20));
//sukhinin\app\services\Db::closeConnection();
