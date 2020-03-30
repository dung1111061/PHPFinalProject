<?php
// Product Table
// Define method to query product table
class customer extends Table 
{
  protected static $tablename = "customer";
  protected static $timestamp = TRUE;
 
  /**
   *
   * return record about customer regitered before, no data if authenticate failed 
   */
  static public function authenticate() {
    $condition = [
        db_customer_email => $_POST["email"],
        db_customer_password => sha1($_POST["password"])
    ]; 
    // $data = array();
    // $data[db_customer_email] = $_POST["email"];
    // $data[db_customer_password] = sha1($_POST["password"]);

    return self::find1record( $condition );
  } 

  static public function logout() {
    unset($_SESSION['customer']);
  } 

  static public function getWishlist(){
      $condition = [
        db_customer_id => $_SESSION['customer']['id']
      ];

      return self::find1record( $condition )[db_customer_wishlist]; 
  }


  static public function addWishlist($product){

    $wishlist = customer::getWishlist();
    $isProductIn = strpos($wishlist, "$product;") !== false; 

    if(! $isProductIn){
      $wishlist = $wishlist . "$product;";
      $data = [
          db_customer_wishlist => $wishlist
        ];
      $condition = [
          db_customer_id => $_SESSION['customer']['id']
        ];
          
      return self::update( $condition, $data ); 
    }

    return self::$stm;
  }
  static public function removeWishlist($product){

    $wishlist = customer::getWishlist();
    $isProductIn = strpos($wishlist, "$product;") !== false; 

    if($isProductIn){ 
      $wishlist = str_replace("$product;","",$wishlist);
      $data = [
          db_customer_wishlist => $wishlist
        ];

      $condition = [
          db_customer_id => $_SESSION['customer']['id']
        ];
        
      return self::update( $condition, $data ); 
    }
    
    return self::$stm;
  }
}