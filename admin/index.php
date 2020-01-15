<?php
// Configuration
include_once "../config.php";
include_once "config.php";

// Autoload module
// Autoload $name class in files located at models ad controllers library when it is called. Automatic convert $name class to lowercase to match files. 
spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "models/$name.php";
    include_once "controllers/".$name."_controller.php";
});

include_once "mylib.php";

// Identicate router 
$route = $_GET["route"];
$action = $_GET["action"];

// Verify login 
AccountController::login($action);

$dashboard_page = new DashboardController();
if ($action === "sendmsg") {
	$dashboard_page->sendmsg();
	
}  else {
	$dashboard_page->show();

}







