<?php
/**
 * summary
 */
class customer_controller extends controller
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
          case "logout":
            $this->action_implement = "logout";
            break;
          case "addCart":
            $this->action_implement = "addCart";
            break;
          case "addWishlist":
            $this->action_implement = "addWishlist";
            break;  
          case "removeCart":
            $this->action_implement = "removeCart";
            break;
        	case "verify": 
        		$this->action_implement = "authenticate";
        		break;
          case "deleteWishlist": 
            $this->action_implement = "deleteWishlist";
            break;  
                
        	default:
        		$message = " do not support action $action";
				    throw new RouteException($message);
        		break;
        }
    }

    /**
     * [ main_home action implement ]
     * @return [type] [description]
     */
    protected function authenticate(){
        //
        if( ! isset($_SESSION['customer']) )
          if(isset($_POST["email"]) && isset($_POST["password"])) {
            $customer = customer::authenticate(); 
            
            if( $customer ) {
                $_SESSION['customer']['id']       = $customer[db_customer_id];

                $_SESSION['customer']['name']     = $customer[db_customer_lastname];

                // $cart = cart::getByCustomer( $_SESSION['customer']['id'] );
                // $_SESSION['customer']['cart']     = $cart ? $cart  : null;
               
                // $wishlist = explode(";",$customer[db_customer_wishlist]); array_pop($wishlist);
                // $_SESSION['customer']['wishlist'] = $wishlist;
                // echo json_encode($customer);
                // if($_POST["login_remember"]) setcookie('privilege_user', $record[db_admin_privilege], time() + 3600,"/"); // save authenticate user for 1 hour
              
            } 
          }

        //
        redirect("index.php");
    }

    /**
     * [addCart add product to cart 
     *   no return if no action be executing, quantity exceeds limit.
     *   product in case sucess
     *   exception if failed on SQL query
     * ]
     */
    protected function addCart(){
      //
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      //
      $id = $_GET["id"];
      //
      $stm = cart::add($id);
      
      if ( !isset($stm) ) return; // not executing sql 

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
        return;
      } 

      //
      // return for ajax approach 
      // echo "$product";
      $product = product::find($id);
      $img = $product[db_product_image];
      $product[db_product_image] = $img? PRODUCT_IMAGE_PATH.$img : 
                      PRODUCT_IMAGE_PATH."image_not_found.png";
      //                
      $response = [
        "id"   => $product[db_product_id],
        "name" => $product[db_product_name],
        "img"  => $product[db_product_image],
        "price"  => $product[db_product_price],  
      ];
      // echo $product;
      echo json_encode($response);
      return;
      // reload page
      // redirect("index.php");

    }

    protected function removeCart(){ 
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      $product = $_GET["id"];
      $stm = cart::remove($product);

      if ( !isset($stm) ) return; // not executing sql

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }

      //
      echo $product;
    }

    /**
     * [addWishlist description]
     *
     * return: 
     *   no return if no action be executing, product in wishlist before.
     *   product in case sucess
     *   exception if failed on SQL query
     */
    protected function addWishlist(){
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      $id = $_GET["id"];
      
      $stm = customer::addWishlist($id);

      if ( !isset($stm) ) return; // not executing sql as product was in wishlist before

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      } 

      //
      // return for ajax approach 
      // echo "$product";
      $product = product::find($id);
      $img = $product[db_product_image];
      $product[db_product_image] = $img? PRODUCT_IMAGE_PATH.$img : 
                      PRODUCT_IMAGE_PATH."image_not_found.png";
      $response = [
        "id"   => $product[db_product_id],
        "name" => $product[db_product_name],
        "img"  => $product[db_product_image]   
      ];
      // echo $product;
      echo json_encode($response);

      // reload page
      // redirect("index.php");
    }

    protected function deleteWishlist(){
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }
      
      $product = $_GET["id"];

      $stm = customer::removeWishlist($product);

      if ( !isset($stm) ) return;

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }
      
      //
      // return for ajax approach 
      echo "$product";
      // reload page
      // redirect("index.php");
    }

    protected function logout(){
      unset($_SESSION['customer']);
      
      //
      redirect("index.php");
    }

}