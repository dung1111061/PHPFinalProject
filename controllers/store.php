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
            case "phantrang":
                $this->action_implement = "phantrang";
                break;
            case "buildProductContent":
                $this->action_implement = "buildProductContent";
                break;    
        	default:
        		$message = "store page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * 
     */
    protected function buildProductContent(){
        $page = $_GET['page'];
        $table = json_decode(
            file_get_contents(ADMIN_PATH."json/productTablesInStore.json"), true
        )[$page-1];
        // echo "<pre>";print_r($table);exit();
        foreach ($table as  $record) {
            $productData = [
                "id"    => $record[db_product_id], 
                "name"  => $record[db_product_name],
                "price" => $record[db_product_price],       
                "old_price" => $record["old_price"],
                "img"   => $record[db_product_image], 
                "discount"   => $record[db_product_discount],
                "rank" => $record[db_product_rank],
                "new" => $record[db_product_new]
            ];
            echo "<div class='col-md-4 col-xs-6'>"; 
            $productTemplate = new Template("module/product", $productData );
            $productTemplate->render();
            echo '</div>';
        }
    }
    /**
     * [main description]
     * @return [type] [description]
     */
    protected function showMain(){

        //=== Query data from model 
        // get manufacturer
        $m_table = Manufacturer::getAll();

        // get product
        $table = Product::getAll();
        
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
            $table = Product::filterCategory($c_filter,$table);
            $filter_info .= " ".Category::find($c_filter)[db_category_name];
        }

        if( isset($_GET["hot_deal"]) )  {
            $table = Product::filterHotdeal($table);
            $filter_info .= " Hàng khuyến mãi";
        }
        // !Note: category and hot deal is always keep, not be delete filter
        
        /**
         * Searching filter 
         */
        if( isset($_GET["searching"]) ) { // avoid undifened error
            if ($_GET["searching"])
                $table = Product::filterSearching($_GET["searching"],$table);
                $filter_info .= ", Từ Khóa ".$_GET["searching"];
        } 

        if( isset($_GET["manufacturer"]) ) { //
            if ( $_GET["manufacturer"] ){
                $m_filter = $_GET["manufacturer"];
                $table = Product::filterManufacturer($m_filter,$table);
                $filter_info .= ", Thương hiệu "; 
                array_walk($m_filter, function($id) use (&$filter_info){
                    $filter_info .= Manufacturer::find($id)[db_manufacturer_name] . " "; 
                });
            }
        }
        
        
        Product::recalculatePrice($table);

        //
        if( isset($_GET["price_min"])  && isset($_GET["price_max"]) ) { 
            if ( $_GET["price_min"] && $_GET["price_max"] ){
                 $price_min = $_GET["price_min"] ;
                $price_max = $_GET["price_max"] ; 
                $table = Product::filterPrice($price_min,$price_max,$table);
                $filter_info .= ", Giá ".$price_min."-".$price_max;
            }
        }

        //===
        // formating filtered table 
        Product::formatProduct2UserApp($table);
        $record_number = count($table);

        
        foreach ($m_table as &$manufacturer) {
            $manufacturer["number"] = 500;

            // save filter previous
            $manufacturer["checked"] = in_array($manufacturer[db_manufacturer_id], $m_filter)?"checked": NULL;
        }

        //=== Phan trang
        echo ADMIN_PATH.'json/productTablesInStore.json'; exit();
        $max_product_in_page = 10;
        $pageNumber = 1;
        if( $record_number > $max_product_in_page) {
            $tableList = array_chunk($table, $max_product_in_page);
            //
            $fp = fopen(ADMIN_PATH.'json/productTablesInStore.json', 'w');
            fwrite($fp, json_encode($tableList) );
            fclose($fp);
            //
            $pageNumber = count($tableList) ;
            $table = $tableList[0];
        }
        //===
        $view = STORE_PATH.'store_paging.php';

        $dataOnView = [
            "table" => $table,
            "m_table" => $m_table,
            "pageNumber" => $pageNumber,
            "max_product" => $max_product_in_page,
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