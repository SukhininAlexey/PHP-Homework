<?php


function render($template, $params = [], $layout = null){
    $content = renderTemplate($template, $params);
    if($layout){
        $content = renderTemplate("layouts/" . $layout, ['content' => $content]);
    }
    return $content;
}

function renderTemplate($template, $params = []){
    ob_start();
    extract($params);
    include TEMPLATES_DIR . "/{$template}.php";
    return ob_get_clean();
}


function execute($query){
    return mysqli_query(getConnection(), $query);
}

function query($query){
    return mysqli_fetch_all(execute($query), MYSQLI_ASSOC);
}


function getConnection($keepConnection = true){
    static $connect = null;
    if($keepConnection){    
        if(!$connect) {
            $connect = mysqli_connect("localhost", "root", "", "PHP_hw5");
        }
        return $connect;
    }else{
        mysqli_close($connect);
        $connect = null;
    }
}