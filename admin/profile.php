<?php
include_once "../config.php";
include_once "config.php";

spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "models/$name.php";
    include_once "controllers/".$name."_controller.php";
});

include_once "mylib.php";

// Identicate router 
$route = $_GET["route"];
$action = $_GET["action"];

// Verify login 
AccountController::login($action);

$profile_page = new ProfileController();
$profile_page->show();
