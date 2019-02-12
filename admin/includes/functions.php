<?php
/**
 *Undeclared Object Backup Function-- Autoload
 */

//Autoload
function classAutoLoader($class){

    $class = strtolower($class);

    $the_path = "includes/{$class}.php";

    if(is_file($the_path)  && !class_exists($class)){
        include $the_path;
    }

}

spl_autoload_register('classAutoLoader');


//Custom redirect
function redirect($location){

    header("Location: {$location}");
}














/*
 function __autoload($class){
    $class = strtolower($class);

    $the_path = "includes/{$class}.php";
    if (file_exists($the_path)){
        require_once ($the_path);
    }else{

       die("This file named {$class}.php was not found man ......") ;
    }
}
 * */