<?php
include_once "../config.php";
include_once "config.php";

spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "models/$name.php";
    include_once "controllers/".$name."_controller.php";
});

include_once "mylib.php";

echo "<pre>";
$value = conversation::getConversation(42);

print_r($value);