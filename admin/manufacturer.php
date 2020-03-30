<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$page = new ManufacturerController();

try {
	if ($action === "insert") {
		$page->insert();

	} elseif($action === "edit") {
		$page->edit();

	} elseif($action === "delete") {
		verify_privilege(privilege::administrator);
		$page->delete();

	} elseif($action === "display_insert"){
			$page->display_details_manufacturer_insert_widget();

	} elseif($action === "display_edit"){
		$page->display_details_manufacturer_edit_widget();

	} else {
		$page->display_manufacturer_table();

	}
} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}




