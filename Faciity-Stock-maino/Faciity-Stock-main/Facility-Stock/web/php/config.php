<?php

    $print = function($class){
        if(file_exists('classes/'.$class.'.php')){
            include_once('classes/'.$class.'.php');
        }
    };

    spl_autoload_register($print);

    define('HOST','localhost');
    define('DATABASE','projeto');
    define('USER','root');
    define('PASSWORD','01202129');
?>
