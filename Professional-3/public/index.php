<?php
header('Content-Type: text/html; charset=utf-8');


include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/services/Autoloader.php"; // класс Autoloader
spl_autoload_register([new sukhinin\app\services\Autoloader(), 'loadClass']); // Стек функций по добавлению файлов с классами

// Тестим, что получилось:
$prod = new sukhinin\app\models\Product("Пирожок");
var_dump($prod->getOne(2)->name);
var_dump($prod->getAll()[0]->name);
//var_dump(sukhinin\app\services\Db::closeConnection());

//$prod->testDisplay();
