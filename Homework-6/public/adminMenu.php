<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6/config/main.php";
require_once ENGINE_DIR . "/functions.php";
require_once ENGINE_DIR . "/funcImgResize.php";

$adminHere = false;
$contentArr = [];
session_start();

if(isset($_SESSION['user']) && ($_SESSION['type'] == "Admin")){
    // Получаем список категорий товаров в виде массива, чтобы потом в select засунуть
    $adminHere = true;
    $adminMessage = "Здесь вы можете добавлять новые товары в базу данных";
    $contentArr = query("SELECT * FROM categories");
    getConnection(FALSE);
}

if($_SERVER['REQUEST_METHOD'] == "POST" && $adminHere){
    
    // Получение информации о товаре
    $tmp = $_FILES["file"]["tmp_name"]; // расположение картинки
    $name = $_POST["name"]; // имя товара
    $price = (int)($_POST["price"]); // Цена
    $category_id = (int)($_POST["type"]); // Тип извлекаем из селекта
    $description = $_POST["description"]; 
    
    // Создаём новую строку в БД и получаем ее id
    execute("INSERT INTO prod_table (name) VALUES('')");
    $id = query("SELECT last_insert_id()")[0]["last_insert_id()"];
    
    // Получаем пути и названия файлов. Я понимаю, что лучше просто назвать картинку именем товара, но я хочу отработать хранение картинки как на хостинге - усложняю себе жизнь, как всегда
    $origin_path_short = UPLOADS_ORIG_DIR_SHORT . "/imgBig-" . $id . ".jpg";
    $preview_path_short = UPLOADS_PREV_DIR_SHORT . "/imgSmall-" . $id . ".jpg";
    
    // Изменяем добавленную в БД строку
    $query = "UPDATE `prod_table` SET `origin_path`='{$origin_path_short}', `preview_path`='{$preview_path_short}', `views`=0, `description`='{$description}', `price`={$price}, `name`='{$name}', `category_id`={$category_id} WHERE `id`={$id}";
    execute($query);
    
    // Дропаем соединение
    getConnection(FALSE);

    // Сохранение файлов
    img_resize($tmp, $preview_path_short, 400, 240);
    move_uploaded_file($tmp, $origin_path_short);    
}

if($adminHere){
    echo render("adminMenu",["options" => $contentArr, "message" => $adminMessage],"main"); // передаем массив с опциями для select в шаблоне
}else{
    echo "<h4>У вас недостаточно прав для работы на данной странице<h4>";
}


?>

