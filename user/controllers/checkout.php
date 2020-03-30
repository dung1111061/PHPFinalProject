<?php
/**
 * summary
 */
class checkout extends controller
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
        		$this->action_implement = "main";
        		break;
                
        	default:
        		$message = "page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * [ main_home action implement ]
     * @return [type] [description]
     */
    protected function main(){
        //

        $cart = $_POST["cart"]; 
        // echo "<pre>";print_r($cart); exit();
        $order = array();
        $order["products"] = array();
        $order["totalPrice"] = 0;

        //
        foreach ( (array) $cart as $record) {            
            $product = product::find( $record["id"] );

            $product["quantity"] = $record["quantity"]; 
            $product["totalPrice"] = $product["quantity"]*$product[db_product_price]; 
            //
            $order["products"][] = $product;
        }
        
        $order["totalPrice"] = array_sum( array_column($order["products"], "totalPrice") );
        //
        $data = array(
            "order" => $order
        );
        //
        $view = CHECKOUT_PATH.'main.php';
        $this->render($view,$data);  
    	
    }

    protected function placeOrder(){
        
        
    }
}