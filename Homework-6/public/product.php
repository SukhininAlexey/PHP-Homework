<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";

$id = (int)$_GET["id"];
execute("UPDATE `prod_table` SET views = views + 1 where id = {$id}");
$request = "SELECT prod_table.id, origin_path, preview_path, views, description, price, prod_table.name, category_id,  categories.name as 'catName' FROM prod_table LEFT JOIN categories on prod_table.category_id = categories.id WHERE prod_table.id = {$id}";
$contentArr = query($request)[0];
getConnection(false);






echo render("product",["product" => $contentArr],"main");




