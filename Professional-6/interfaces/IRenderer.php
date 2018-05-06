<?php

namespace sukhinin\app\interfaces;
/**
 *
 * @author Lex
 */
interface IRenderer {
    public function render($template, $params = []);
}
