<?php
    

    spl_autoload_register(function ($class) {
        $class = strtolower($class);
        $path = __DIR__ . "/controllers/{$class}.php";
        $path_mod = __DIR__ . "/models/{$class}.php";
        
        
        
        if ( is_readable($path) ) {

            require $path; 
        } elseif ( is_readable($path_mod) ) {

            require_once $path_mod;
        }
        
    });