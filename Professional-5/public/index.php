<?php
header('Content-Type: text/html; charset=utf-8');

include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/services/Autoloader.php"; // класс Autoloader

// Подключение twig начало
include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/vendor/autoload.php"; // Автозагрузчик composer'а
// Подключение twig конец

spl_autoload_register([new sukhinin\app\services\Autoloader(), 'loadClass']); // Стек функций по добавлению файлов с классами

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "sukhinin\app\controllers\\". ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(new sukhinin\app\services\TemplateRenderer());
    $controller->runAction($actionName);
}

// Тестим, что получилось:
//$prod = new sukhinin\app\models\Product(null, "Чифир", "Бодрит!", 100);
//$prod = sukhinin\app\models\Product::getAll()[0];
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
