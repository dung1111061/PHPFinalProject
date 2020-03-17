<?php
namespace controller;

/**
 * summary
 */
class product extends \controller
{
    /**
     * summary
     */

    /**
     * [__construct description]
     * @param [type] $action [description]
     */
    public function __construct($action)
    {
        switch ($action) {
        	case "":
        		$action = "show";

        	case "show": // show main home page
        		$this->action_implement = "main";
        		// implement action to loadPage 
        		
        		break;
        	default:
        		$message = "product page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * [main_home description]
     * @return [type] [description]
     */
    protected function main(){
    	require_once PRODUCT_PATH.'product.php';
    }
}

