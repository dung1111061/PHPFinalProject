<?php
// Version
define('VERSION', '3.1.0.0_b');

// Configuration
require_once "../config.php"; // common configuration
require_once "config.php"; //  configuration specific for admin application

// 
ob_start();

// Route
require_once STORE_PATH.'store.php';

$content = ob_get_clean();

require_once LAYOUT_PATH.'layout.php';
