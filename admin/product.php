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
$product_page = new ProductController();

if ($action === "insert") {
	$product_page->insert();

} elseif($action === "edit") {
	$product_page->edit();

} elseif($action === "delete") {
	verify_privilege(privilege::administrator);
	$product_page->delete();

} else {
	if($route === "insert"){
		$product_page->insert_display_details_product();

	} elseif($route === "edit"){
		$product_page->edit_display_details_product();

	} else {
		$product_page->display_product_table();

	}
}




