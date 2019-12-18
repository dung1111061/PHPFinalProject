<?php
include_once "config.php";
include_once "connection.php";
include_once("controllers/base_controller.php");
include_once("controllers/product_controller.php");

include_once("models/product.php");
include_once("models/manufacturer.php");
// Identicate router 
$route = $_GET["route"];
$action = $_GET["action"];

// 
$product_page = new ProductController();

if ($action === "insert") {
	$product_page->insert();

} elseif($action === "edit") {
	$product_page->edit();

} elseif($action === "delete") {
	$product_page->delete();

} else {
	if($route === "details/insert"){
		$product_page->insert_display_details_product();
	} elseif($route === "details/edit"){
		$product_page->edit_display_details_product();
	} else {
		$product_page->display_product_table();
	}
}