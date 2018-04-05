<?php
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . "/PHP-Homework/Homework-6");
define('PUBLIC_DIR', ROOT_DIR . "/public");
define('ENGINE_DIR', ROOT_DIR . "/engine");
define('TEMPLATES_DIR', ROOT_DIR . "/templates");
define('LAYOUTS_DIR', TEMPLATES_DIR . "/layouts");
define('UPLOADS_DIR', PUBLIC_DIR . "/uploads");

define('UPLOADS_PREV_DIR_FULL', UPLOADS_DIR . "/preview");
define('UPLOADS_ORIG_DIR_FULL', UPLOADS_DIR . "/origin");

define('UPLOADS_PREV_DIR_SHORT', "./uploads/preview");
define('UPLOADS_ORIG_DIR_SHORT', "./uploads/origin");
