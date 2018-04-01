<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-5/config/main.php";
require_once ENGINE_DIR . "/functions.php";
require_once ENGINE_DIR . "/funcImgResize.php";
require_once TEMPLATES_DIR . "/upload_form.php";


//$prevContent = scandir(UPLOADS_PREV_DIR);
//$prevContentLength = count($prevContent);











if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    // Получение пути файла
    $tmp = $_FILES["file"]["tmp_name"];
    
    // Запрос к базе данных
    $connection = mysqli_connect("localhost", "root", "", "PHP_hw5");
    $res = mysqli_query($connection, "SELECT max(id) FROM pics_table");
    $id = mysqli_fetch_assoc($res)["max(id)"] + 1;
    $origin_path_full = UPLOADS_ORIG_DIR_FULL . "/imgBig-" . $id . ".jpg";
    $preview_path_full = UPLOADS_PREV_DIR_FULL . "/imgSmall-" . $id . ".jpg";
    
    $origin_path_short = UPLOADS_ORIG_DIR_SHORT . "/imgBig-" . $id . ".jpg";
    $preview_path_short = UPLOADS_PREV_DIR_SHORT . "/imgSmall-" . $id . ".jpg";
    
    $querry = "INSERT INTO pics_table (origin_path, preview_path, views) VALUES (\"{$origin_path_short}\", \"{$preview_path_short}\", 0)";
    mysqli_query($connection, $querry);
    mysqli_close($connection);
    
    // Сохранение файлов
    img_resize($tmp, $preview_path_full, 400, 240);
    move_uploaded_file($tmp, $origin_path_full);
    
    
}


require_once TEMPLATES_DIR . "/gallery.php";

?>

