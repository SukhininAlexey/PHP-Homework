<?php

namespace sukhinin\app\services;

/**
 * Description of TwigRenderer
 *
 * @author Lex
 */
class TwigRenderer implements \sukhinin\app\interfaces\IRenderer {
    
    public function render($template, $params = []){
        $loader = new \Twig_Loader_Filesystem(TWIG_TEMPLATES_DIR);
        $twig = new \Twig_Environment($loader);
        return $twig->render("{$template}.php", $params);
    }
}
