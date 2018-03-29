<?php
showDirs("./startDir");
removeDir("./deleteMe");

function showDirs(string $src){
    $dir = opendir($src);
    echo "<ul>";
    for($i = 0; $file = readdir($dir); $i++){
        if ($i > 1){
            echo "<li>";
            if(is_dir($src . "/" . $file)){
                echo "<strong>Folder: " . $file . "</strong>";
                showDirs($src . "/" . $file);
            }else {
                echo $file;
            }
            echo "</li>";
        }
    }
    echo "</ul>";
    closedir($dir);
}

// Доделать!

function removeDir(string $src){
    $dir = opendir($src);
    for($i = 0; $file = readdir($dir); $i++){
        if ($i > 1){
            if(is_dir($src . "/" . $file)){
                removeDir($src . "/" . $file);
            }else {
                unlink($src . "/" . $file);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

?>
