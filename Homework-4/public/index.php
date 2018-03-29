<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-4/config/main.php";
require_once ENGINE_DIR . "/functions.php";
require_once ENGINE_DIR . "/funcImgResize.php";
require_once TEMPLATES_DIR . "/upload_form.php";


$prevContent = scandir(UPLOADS_PREV_DIR);
$prevContentLength = count($prevContent);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $tmp = $_FILES["file"]["tmp_name"];
    $dest = UPLOADS_PREV_DIR . "/" . "imgSmall-" . ($prevContentLength - 1) . ".jpg";
    img_resize($tmp, $dest, 400, 240);
    $filePath = UPLOADS_ORIG_DIR . "/" . "imgBig-" . ($prevContentLength - 1) . ".jpg";
    move_uploaded_file($tmp, $filePath);
    $prevContent = scandir(UPLOADS_PREV_DIR);
}


require_once TEMPLATES_DIR . "/gallery.php";

?>

