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

        	case "main": 
        		$this->action_implement = "main";
        		break;

            case "placeOrder": 
                $this->action_implement = "placeOrder";
                break;    

  
                
        	default:
        		$message = "page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * 
     */
    protected function getOrderDatafromForm(){
        $data = [];
        //
        $data[db_order_payment_firstName]  = $_POST["payment_firstName"];
        $data[db_order_payment_lastName]   = $_POST["payment_lastName"];
        $data[db_order_payment_email]      = $_POST["payment_email"];
        $data[db_order_payment_address]    = $_POST["payment_address"];
        $data[db_order_payment_city]       = $_POST["payment_city"];
        $data[db_order_payment_country]    = $_POST["payment_country"];
        $data[db_order_payment_postcode]   = $_POST["payment_postcode"];
        $data[db_order_payment_telephone]  = $_POST["payment_tel"];
        //
        $data[db_order_shipping_firstName]  = $_POST["shipping_firstName"];
        $data[db_order_shipping_lastName]   = $_POST["shipping_lastName"];
        $data[db_order_shipping_email]      = $_POST["shipping_email"];
        $data[db_order_shipping_address]    = $_POST["shipping_address"];
        $data[db_order_shipping_city]       = $_POST["shipping_city"];
        $data[db_order_shipping_country]    = $_POST["shipping_country"];
        $data[db_order_shipping_postcode]   = $_POST["shipping_postcode"];
        $data[db_order_shipping_telephone]  = $_POST["shipping_tel"];
        $data[db_order_note]                = $_POST["note"];
        $data[db_order_totalPrice]          = $_POST["totalPrice"];

        //
        return $data;
    }

    /**
     * Lay du lieu tu post method request
     */
    protected function getOrderProductDatafromForm(){
        // length of $_POST["product"] and $_POST["quantity"] must be same
        if( count($_POST["product"]) != count($_POST["quantity"]) )
            echo "Something worng";
        
        //
        $data =[];
        for ($i=0; $i<count($_POST["product"]); $i++){
            $data[$i][db_orderProduct_product] = $_POST["product"][$i];
            $data[$i][db_orderProduct_quantity] = $_POST["quantity"][$i];
        }

        //
        return $data;
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
            $product = Product::find( $record["id"] );

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

        $script = CHECKOUT_PATH."checkout.js";

        $this->render($view,$data,$script);  
    	
    }

    protected function placeOrder(){
        //
        $data                    = self::getOrderDatafromForm();
        $data[db_order_customer] = $_SESSION['customer']['id'];

        // tao chi tiet order
        $stm = Order::createNew($data);
        if( $stm->errorInfo()[2] ) {
            $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
            throw new MySQLQueryException($message);
        } 
        $order = DB::getInstance()->lastInsertId();
        // echo "<pre>";print_r($data);exit();
        //
        $data     = self::getOrderProductDatafromForm();
        
        foreach ($data as $record) {
            $orderProduct = [];
            $orderProduct[db_orderProduct_order]    = $order;
            $orderProduct[db_orderProduct_product]  = $record[db_orderProduct_product]; 
            $orderProduct[db_orderProduct_quantity] = $record[db_orderProduct_quantity];
            // them san pham vao order
            $stm = OrderProduct::createNew($orderProduct); 
            if($stm->errorInfo()[2]) {
                $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
                throw new MySQLQueryException($message);
            }

            // Xoa san pham khoi gio hang
            for( $i=0; $i<$record[db_orderProduct_quantity]; $i++){
                $stm = Cart::remove( $record[db_orderProduct_product] ); 
                if($stm->errorInfo()[2]) {
                    $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
                    throw new MySQLQueryException($message);
                }
            }    
        }

        // tao trang thai cho order
        $data = [
            db_orderStatus_order => $order,
            db_orderStatus_status => ORDER_STATUS::processing
        ];
        $stm = OrderStatus::createNew($data);
        if($stm->errorInfo()[2]) {
            $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
            throw new MySQLQueryException($message);
        }
    //
      echo "Đơn hàng đang được xử lí <br>";
      echo "Nhấn link để trở về <a href='index.php'>trang chủ </a>";
    }
}