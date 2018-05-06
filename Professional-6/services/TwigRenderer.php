<?php

namespace sukhinin\app\services;

/**
 * Description of TwigRenderer
 *
 * @author Lex
 */
class TwigRenderer implements \sukhinin\app\interfaces\IRenderer {
    
    private $twigInst;


    public function __construct() {
        $loader = new \Twig_Loader_Filesystem(TWIG_TEMPLATES_DIR);
        $this->twigInst = new \Twig_Environment($loader);
    }

    public function render($template, $params = []){
        return $this->twigInst->render("{$template}.php", $params);
    }
}
