<?php

class Autoload
{

    static function run(){
        spl_autoload_register(function ($class_name) {
            $file = str_replace('\\', '/', $class_name);
            require_once $file . '.php';
        });
    }
}
