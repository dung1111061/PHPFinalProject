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
        		$this->action_implement = "showMain";
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
    protected function showMain(){

        //
        $view = HOME_PATH.'home.php';

        //
        $category_table = category::getParentCategoryTable();
        
        //
        $new_product_tables =array();
        foreach ($category_table as $category) {
            $category_id = $category[db_category_id];
            $new_product_table = product::getAvaiNewProduct();
            $new_product_table = product::filterCategory($category_id,$new_product_table);
            product::recalculatePrice($new_product_table);
            product::formatProduct2UserApp($new_product_table);
            $new_product_tables[ $category_id ] = $new_product_table;
        }

//
        $top_selling_tables =array();
        foreach ($category_table as $category) {
            $category_id = $category[db_category_id];
            $top_selling_table = product::getAvaiTopProduct();
            $top_selling_table = product::filterCategory($category_id,$top_selling_table);
            product::recalculatePrice($top_selling_table);
            product::formatProduct2UserApp($top_selling_table);
            $top_selling_tables[ $category_id ] = $top_selling_table;
        }
        
        //
        $dataOnView = [
            "category_table" => $category_table,
            "new_product_tables" => $new_product_tables,
            "top_selling_tables" => $top_selling_tables 
        ];

        //
        $script = HOME_PATH."home.js";

        //
        $this->render($view,$dataOnView,$script);    	
    }
}