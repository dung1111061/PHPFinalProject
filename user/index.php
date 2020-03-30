<?php

require_once "bootstraping.php";

// Catch exception 
try {
	//  Map controller
	switch ($controller) {
	    case NULL:
	    $controller = "home";

	    case "home":
	    
	    case "product_controller":
	    	
	    case "store":
	    
	    case "checkout":

	    case "customer_controller":

	    case "available controller": // all available controller will execute this block
	    	$page = new $controller($action); //  implement action for request from "action" URL parameter
	    	$page->doAction(); 
	    	break;

	    default:
	    	$message = "$controller controller not found";
			throw new MySQLQueryException($message);
	    	break;
	    	
	}	
} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";

}