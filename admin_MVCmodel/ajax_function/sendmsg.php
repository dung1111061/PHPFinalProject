<?php
include_once "../config.php";
spl_autoload_register(function ($class_controller_name) {
    $name = strtolower(str_replace("Controller", "", $class_controller_name));
    include_once "../models/$name.php";
});

conversation::insert($_GET["message"]);

