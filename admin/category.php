<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$page = new CategoryController();

try {
	$page->display_category_table();
} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}




