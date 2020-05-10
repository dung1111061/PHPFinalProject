<?php

// 



// Loading configuration

if (file_exists("../config.php")) include_once "../config.php";

if (file_exists("constant.php")) include_once "constant.php";



//Automatic loading class

spl_autoload_register(function ($class_controller_name) {

	$name = strtolower(str_replace("Controller", "", $class_controller_name));

	if(strpos($class_controller_name, "Controller")){

		if(is_file("controllers/".$name."_controller.php")) 

			include_once "controllers/".$name."_controller.php";

	} else{

		if(is_file("models/$name.php")) 

			include_once "models/$name.php";

		if(is_file("models/libraries/$name.php"))

			include_once "models/libraries/$name.php";

	}

});



// Loading application specific functionality

include_once "mylib.php";



// Geting action on request from URI



$action = isset($_GET["action"])? $_GET["action"] : NULL;



// Verifing account 

$account = new AccountController();

$authenticated = $account->authenticate($action);



// Only render login page if no authenticated

if (!$authenticated) {

	exit();

}