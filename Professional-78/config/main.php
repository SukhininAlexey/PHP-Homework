<?php
return [
    "root_dir" => $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/",
    "reposirories_namespace" => "sukhinin\app\models\\repositories\\",
    "controllers_namespace" => "sukhinin\app\controllers\\",
    "templates_dir" => $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/views/",
    "twig_templates_dir" => $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/twig_views/",
    "components" => [
        "db" => [
            "class" => sukhinin\app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'php2shop',
            'charset' => 'utf8'
        ],
        "request" => [
            "class" => \sukhinin\app\services\Request::class,
        ],
        "session" => [
            "class" => sukhinin\app\services\Session::class,
        ],
        "cart" => [
            "class" => sukhinin\app\models\Cart::class,
        ]
    ]
];


/*
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Professional-2/");
define('TEMPLATES_DIR', ROOT_DIR . "views/");
define('TWIG_TEMPLATES_DIR', ROOT_DIR . "twig_views/");
 */