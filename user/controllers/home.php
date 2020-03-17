<?php
/**
 * summary
 */
class home extends controller
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
        		$action = "main";

        	case "main": // main home page
                // Point action implement and script for main home page
        		$this->action_implement = "main_home";
                $this->script = HOME_PATH."main_home.js";
        		
        		break;
        	default:
        		$message = "home page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * [ main_home action implement ]
     * @return [type] [description]
     */
    protected function main_home(){
        //
        $category_table = category::getParentCategoryTable();
        $new_product_table = product::getAvaiNewProduct();
        $top_selling_table = product::getAvaiTopProduct();

        //
        if(is_file(HOME_PATH.'home.php')) {
            include_once HOME_PATH.'home.php';
        }
    	
    }
}