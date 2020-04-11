<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$page = new CustomerController();
if($action === "export2Excel")
	$page->exportCustomerInfo2Excel();
else{
	$page->show();
}




