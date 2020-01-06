<?php
	include_once "../config.php";
	include_once("../models/admin.php");

	admin::update(array(db_admin_email => $_GET["email"]),array(db_admin_password => sha1($_POST["passwd"])));
	require_once('../views/account/back2login.php');