<?php
/**
 * Defining route to product controller
 */

//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//------------------------------------

$controller = new OrderController();

try {
	if ($action === "display_new_orders") {
		$controller->display_new_orders();

	} elseif ($action === "display_accomplished_orders") {
		$controller->display_accomplished_orders();
		
	} elseif ($action === "display_details_order") {
		$controller->display_details_order();

	} elseif ($action === "shipping_order") {
		$controller->shipping_order();

	} elseif ($action === "accomplish_order") {
		$controller->accomplish_order();
	}


} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}
