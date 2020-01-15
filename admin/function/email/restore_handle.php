<?php
include_once "../../config.php";
include_once "../config.php";
spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "../".ADMIN_PATH."models/$name.php";
});
include_once "../".ADMIN_PATH."mylib.php";

	admin::update(array(db_admin_email => $_GET["email"]),array(db_admin_password => sha1($_POST["passwd"])));
	require_once('../views/account/back2login.php');