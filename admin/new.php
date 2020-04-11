<?php
//------------------------------------
// Bootstraping application
include_once "bootstraping.php";

//
$page = new NewController();

if ($action === "insert" ) {
	$page->insert();
} elseif($action === "edit" ) {
	$page->edit();
} elseif($action === "editor" ){
	$page->display_createNew();
} elseif($action === "display_edit" ){
	$page->display_edit();
} elseif($action === "send" ){
	$page->sendMail2Subscriber();
} else {
	$page->display_list();
}




