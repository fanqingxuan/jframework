<?php

use Kint\Kint;
use Kint\Renderer\RichRenderer;

function __init_kint() {
    RichRenderer::$theme = 'aante-light.css';
}
if (!function_exists('p')) {
   
    /**
     * Alias of Kint::dump().
     *
     * @return int|string
     */
    function p()
    {
        __init_kint();
        $args = \func_get_args();

        return \call_user_func_array(['Kint', 'dump'], $args);
    }

    Kint::$aliases[] = 'p';
}

if (!function_exists('pp')) {
    /**
     * @return never
     */
    function pp(...$vars)
    {
        __init_kint();
        if (!in_array(\PHP_SAPI, ['cli', 'phpdbg'], true) && !headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }

        $args = \func_get_args();

        \call_user_func_array(['Kint', 'dump'], $args);

        exit(1);
    }
    Kint::$aliases[] = 'pp';
}