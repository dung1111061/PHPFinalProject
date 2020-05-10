<?php

// bootstraping configuration for request to base URL.





define('VERSION', '3.1.0.0_b');



// Configuration



require_once "config.php"; // common configuration

require_once "constant.php"; //  configuration specific for admin application



// auto load class

spl_autoload_register(function ($name) {

    // tat cac file class dat ten lower case

    $name = strtolower($name);

    //

    if(is_file(USER_PATH."models/$name.php")) 

    	include_once USER_PATH."models/$name.php";

    

    if(is_file(USER_PATH."models/libraries/$name.php")) 

    	include_once USER_PATH."models/libraries/$name.php";



    if(is_file("controllers/$name.php")) 

    	include_once "controllers/$name.php";



    include_once "view/template/template.class.php";

});

include_once USER_PATH."mylib.php";



// get controller and action from URL

$controller = isset($_GET["controller"]) ? $_GET["controller"] : NULL;

$action     = isset($_GET["action"]) ? $_GET["action"] : NULL;