<?php
// namespace controller;
/**
 * summary
 */
class controller
{
    /**
     * summary
     */
    protected $action_implement=""; // Point to action implement

    /**
     * [doAction  execute action, which is implemented for request, 
     * pointed by action_implement property]
     * @return [type] [description]
     */
    function doAction(){
    	// .pass function to callback.
    	call_user_func(array($this, "$this->action_implement")); 
    }


    //Note: 
    /**
     * [render Render a file and process load layout and script
     * no script pass meaning no load script
     * view must be pass
     * ]
     * @param  [type] $view       [description]
     * @param  array  $dataOnView [description]
     * @param  string $script     [description]
     * @return [type]             [description]
     */
    function render($view,$dataOnView=array(),$script=""){

        extract($dataOnView);
        $content = "";
        if($view){
        // load view stored on $content variable
            ob_start();

            if( is_file("$view") ) {
                include_once "$view";
            } else {
                echo "$view not found";
            } 
                
            $content = ob_get_clean();              
        }
        
        if($script)
            $script = $this->loadScript($script);

        $this->generateApplication($content,$script);
        
    }

    // Load script for $view page
    function loadScript($script){
        ob_start(); // Navigating buffer to cache memory

    	if(is_file($script)) {
    		include_once $script;
    	} else {
            echo "$script not found";
        }

        return ob_get_clean(); // release cache
    }

    /**
     * [generateApplication import content and script to layout 
     * and generate application on client side]
     * @param  [type] $content [description]
     * @param  [type] $script  [description]
     * @return [type]          [description]
     */
    function generateApplication($content,$script){
        //
        if ( isset($_SESSION['customer']) ){
            $wishlist_id = Customer::getWishlist();
            $wishlist_id = explode(";",$wishlist_id); array_pop($wishlist_id);
            $wishlist = array();
            foreach ( (array)$wishlist_id  as $id) {
                $product = Product::find($id);
                $img = $product[db_product_image];
                $product[db_product_image] = $img? PRODUCT_IMAGE_URL.$img : PRODUCT_IMAGE_URL."image_not_found.png"; 
                $wishlist[]=$product; 
            }

        } else {
            $wishlist = null;
        }
                
        if ( isset($_SESSION['customer']) ){
            //
            $cart_id = Cart::getByCustomer( $_SESSION['customer']['id'] );
            //
            $cart = array();
            $cart["products"] = array();
            $cart["totalPrice"] = 0;
            $cart["totalQuantity"] = 0;
            foreach ((array)$cart_id  as $record) {
                $product = Product::find($record[db_cart_product]);
                
                $product["quantity_cart"] = $record[db_cart_quantity];
                
                // $img = $product[db_product_image];
                // $product[db_product_image] = $img? PRODUCT_IMAGE_URL.$img : PRODUCT_IMAGE_URL."image_not_found.png";
        
                $cart["products"][] = $product;
            }
            Product::recalculatePrice($cart["products"]);
            Product::formatProduct2UserApp( $cart["products"] );
            // $cart["totalPrice"] += $product[db_product_price]*$product["quantity_cart"];    
            $cart["totalQuantity"] = array_sum( array_column($cart["products"], "quantity_cart") );
 
        } else 
            $cart = null;

        // Get keyword in URL for searching field
        $keyword = isset($_GET["searching"]) ?  $_GET["searching"] : NULL;

        // category for navigation bar 
        $category_table = Category::getParentCategoryTable(); 
        
        // Get category filter 
        $c_filter = isset($_GET["category"]) ?  $_GET["category"] : NULL;

        //
        require_once LAYOUT_PATH.'layout.php';
    }
}