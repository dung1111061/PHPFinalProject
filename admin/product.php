<?php
/**
 * Defining route to product controller
 */

//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//------------------------------------
$product_page = new ProductController();

try {
	if ($action === "insert") {
		$product_page->insert();

	} elseif($action === "edit") {
		$product_page->edit();

	} elseif($action === "delete") {
		$product_page->delete();

	} elseif($action === "display_insert"){
		$product_page->display_details_product_insert_widget();

	} elseif($action === "display_edit"){
		$product_page->display_details_product_edit_widget();

	} else {
		$product_page->display_product_table();
	}

} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}
