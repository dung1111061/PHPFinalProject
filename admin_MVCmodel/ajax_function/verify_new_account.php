<?php
	include_once "../config.php";
    spl_autoload_register(function ($class_controller_name) {
        $name = strtolower(str_replace("Controller", "", $class_controller_name));
        include_once "../models/$name.php";
    });

	$result = 0;
    $message = "";
    // Verify username registered already
    if(!empty( admin::simple_fetch( db_admin_username, $_GET['user'])) ) $result+=1;

    // Verify email registered already
    if(!empty( admin::simple_fetch( db_admin_email, $_GET['email'])) ) $result+=2;

    switch ($result) {
     case 1:
         $message = "username registered already";
         break;
     case 2:
         $message = "mail registered already";
         break;
     case 3:
         $message = "username,mail registered already";
         break;      
    }

    echo $message;
