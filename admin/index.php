<?php
/**
 * Defining route to product controller
 */

//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

$dashboard_page = new DashboardController();
if ($action === "sendmsg") {
	$dashboard_page->sendmsg();
	
}  else {
	$dashboard_page->show();

}