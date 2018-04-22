<?php
header('Content-Type: text/html; charset=utf-8');


include $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/services/Autoloader.php"; // класс Autoloader
spl_autoload_register([new sukhinin\app\services\Autoloader(), 'loadClass']); // Стек функций по добавлению файлов с классами

// Тестим, что получилось:
$prod = new sukhinin\app\models\Product("Циркулфрный молоток", new \sukhinin\app\services\Db());
echo $prod->getAll()[0] . "<br>";
echo $prod->getOne(10)[0] . "<br>";
$prod->testDisplay();

