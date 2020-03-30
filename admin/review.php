<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$review_page = new ReviewController();

if ($action === "update" ) {
	$review_page->updateStatus();
} else {
	$review_page->show();
}




