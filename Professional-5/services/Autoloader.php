<?php
/**
 * Description of Autoloader
 *
 * @author Lex
 */
namespace sukhinin\app\services;

class Autoloader {
    
    public function loadClass($className){
        $includeStr = preg_replace('/^[A-Za-z0-9]+\\\\[A-Za-z0-9]+/',$_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2",$className); // подменяем начало
        $includeStr = str_replace("\\", DIRECTORY_SEPARATOR, $includeStr); // заменяем все обратные слеши
        $includeStr .= ".php"; //подставляем .php
        // Проверяем, есть ли такой файл
        if(file_exists($includeStr)){
            include $includeStr;
        }
    }
}
