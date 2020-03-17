<?php

require_once "bootstraping.php";

// Catch exception 
try {
	//  Map controller
	switch ($controller) {
	    case NULL:
	    $controller = "home";

	    case "home":
	    
	    case "product":
	    	
	    case "store":
	    
	    case "checkout":

	    case "account":

	    case "available controller": // all available controller will execute this block
	    	
	    	// $controller = "\\controller\\".$controller; // use controller namespace 
	    	
	    	$page = new $controller($action); //  Map action in constructor
	    	$content = $page->loadPage(); // load page to cache memory
	    	break;

	    default:
	    	$message = "$controller controller not found";
			throw new MySQLQueryException($message);
	    	break;
	}	
	
	// Load script to cache memory
	$script = $page->loadScript();
	
	// import content and script to layout and generate application on client side
	$page->generateApplication($content,$script);

} catch (Exception $e) {
	echo 'Caught ',  $e, "\n";
}