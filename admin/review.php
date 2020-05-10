<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$review_page = new ReviewController();
try {
	if ($action === "update" ) {
		$review_page->updateStatus();
	} elseif ($action === "approve" ) {
		$review_page->approve();
	} elseif ($action === "reject" ) {
		$review_page->reject();
	} elseif ($action === "showApproved" ) {
		$review_page->showApproved();
	} elseif ($action === "showRejected" ) {
		$review_page->showRejected();
	} else {
		$review_page->show();
	}
} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}




