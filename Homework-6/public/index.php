<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

$contentArr = query("SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName' FROM prod_table LEFT JOIN categories on prod_table.category_id = categories.id");

getConnection(false);

echo render("index",["products" => $contentArr],"main");

?>

