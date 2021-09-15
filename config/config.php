<?php

spl_autoload_register(function($className) {

    if(file_exists($className.'.php')) {

        require_once($className.'.php');
    }
    else if(file_exists('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'utilitarios'.DIRECTORY_SEPARATOR.$className.'.php')) {

        require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'utilitarios'.DIRECTORY_SEPARATOR.$className.'.php');
    }
    else if(file_exists('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.$className.'.php')) {

        require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.$className.'.php');
    }
});
?>