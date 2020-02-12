<?php

//load config
require_once("config/config.php");

// autoloade core libraries
spl_autoload_register(function($class_name){
    require_once("libraries/$class_name.php");
});

// init core library
$init = new Core();

?>