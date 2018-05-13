<?php

namespace sukhinin\app\services;

/**
 * Description of TemplateRenderer
 *
 * @author Lex
 */
class TemplateRenderer implements \sukhinin\app\interfaces\IRenderer {
    
    public function render($template, $params = []){
        ob_start();
        extract($params);
        include \sukhinin\app\base\App::call()->config["templates_dir"] . "/{$template}.php";
        return ob_get_clean();
    }
}
