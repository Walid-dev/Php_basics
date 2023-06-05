<?php

spl_autoload_register(function ($class) {
    $root = dirname(__FILE__);  // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});
