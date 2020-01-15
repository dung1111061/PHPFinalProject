<?php
// Version
define('VERSION', '3.1.0.0_b');

// Configuration
require_once "../config.php"; // common configuration
require_once "config.php"; //  configuration specific for admin application

//
spl_autoload_register(function ($name) {
    $name = strtolower($name);
    include_once "../admin/models/$name.php";
});


// 
ob_start();
require_once HOME_PATH.'home.php';
$content = ob_get_clean();

require_once LAYOUT_PATH.'layout.php';
