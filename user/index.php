<?php
// Version
define('VERSION', '3.1.0.0_b');

// Configuration
require_once "../config.php"; // common configuration
require_once "config.php"; //  configuration specific for admin application

// // Startup
echo "<pre>";
print_r(get_defined_constants(true)["user"]);