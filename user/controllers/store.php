<?php
// namespace controller;

/**
 * summary
 */
class store extends \controller
{
    /**
     * summary
     */
    

    /**
     * [__construct description]
     * @param [type] $action [description]
     */
    public function __construct($action="")
    {
        switch ($action) {
        	case "":
        		$action = "main";

        	case "main": // main page
        		$this->action_implement = "showMain";

        		break;
        	default:
        		$message = "store page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * [main description]
     * @return [type] [description]
     */
    protected function showMain(){

        //=== Query data from model 
        // get manufacturer
        $m_table = manufacturer::getAll();

        // get product
        $table = product::getAll();
        
        // get URL, URL of sub store page is stored and combined with filter tool.
        // 
        // $url = full_url();  

        // URL remove searching filter, used for reload page without filter from tool and searching, keep filter category and hot deal
        // $customize_url = preg_replace('/&searching=(.*)/',"", $url);
        
        //=== Declare filter infomation stored variables for view store.php
        // infomation of filter show for user 
        $filter_info = "";

        // filter of category and manufacturer
        $m_filter = array();
        $c_filter = "";

        // value min max for filter price
        $price_min = "";
        $price_max = "";

        $record_number = 0;

        // Note: in development
        // Filter box is apply yet or not to 
        // $filtered_yet_flag = true;  // true as alway reset page when delete filter
        
        //=== Filter data from filter tool and URL
        // Filter from URL paramenter
        if( isset($_GET["category"]) ) {
            $c_filter = $_GET["category"];
            $table = product::filterCategory($c_filter,$table);
            $filter_info .= " ".category::find($c_filter)[db_category_name];
        }

        if( isset($_GET["hot_deal"]) )  {
            $table = product::filterHotdeal($table);
            $filter_info .= " Khuyen Mai Hot";
        }
        // !Note: category and hot deal is always keep, not be delete filter
        
        /**
         * Searching filter 
         */
        if( isset($_GET["searching"]) ) { // avoid undifened error
            if ($_GET["searching"])
                $table = product::filterKeyword($_GET["searching"],$table);
                $filter_info .= ", Từ Khóa ".$_GET["searching"];
        } 

        // Filter from tool, parameter via POST method, filter only if parameter has value 
        //
        if( isset($_GET["manufacturer"]) ) { // avoid undifened error
            if ( $_GET["manufacturer"] )
                $m_filter = $_GET["manufacturer"];
                $table = product::filterManufacturer($m_filter,$table);
                $filter_info .= ", Thuong Hieu "; 
                array_walk($m_filter, function($id) use (&$filter_info){
                    $filter_info .= manufacturer::find($id)[db_manufacturer_name] . " "; 
                });
            
        }

        
        product::recalculatePrice($table);
        //
        if( isset($_GET["price_min"])  && isset($_GET["price_max"]) ) { // avoid undifened error
            if ( $_GET["price_min"] && $_GET["price_max"] )
                $price_min = $_GET["price_min"] ;
                $price_max = $_GET["price_max"] ; 
                $table = product::filterPrice($price_min,$price_max,$table);
                $filter_info .= ", Gia ".$price_min."-".$price_max;
        }

        //===
        // formating filtered table 
        product::formatProduct2UserApp($table);
        $record_number = count($table);


        foreach ($m_table as &$manufacturer) {
            $manufacturer["number"] = 500;

            // save filter previous
            $manufacturer["checked"] = in_array($manufacturer[db_manufacturer_id], $m_filter)?"checked": NULL;
        }

        //===
        $view = STORE_PATH.'store.php';

        $dataOnView = [
            "table" => $table,
            "m_table" => $m_table,
            
            //
            "price_min" => $price_min,
            "price_max" => $price_max,
            "filter_info" => $filter_info,
            "record_number" => $record_number,
        ];

        $script = STORE_PATH."store.js";

        //
        $this->render($view,$dataOnView,$script);
    }
}