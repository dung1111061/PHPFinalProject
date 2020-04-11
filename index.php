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

	    case "new_controller":

	    case "available controller": 
	    	$page = new $controller($action); 
	    	$page->doAction(); 
	    	break;

	    default:
	    	$message = "$controller controller not found";
			throw new MySQLQueryException($message);
	    	break;
	}	
} catch (Exception $e) {
	echo "<pre>";
	echo 'Caught ',  $e, "\n";

}