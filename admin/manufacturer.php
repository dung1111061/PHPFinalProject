<?php
include_once "../config.php";
include_once "config.php";

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

//
$page = new ManufacturerController();

if ($action === "insert") {
	$page->insert();

} elseif($action === "edit") {
	$page->edit();

} elseif($action === "delete") {
	verify_privilege(privilege::administrator);
	$page->delete();

} else {
	if($route === "insert"){
		$page->display_details_manufacturer_insert_widget();

	} elseif($route === "edit"){
		$page->display_details_manufacturer_edit_widget();

	} else {
		$page->display_manufacturer_table();

	}
}




