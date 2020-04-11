<?php
// Product Table
// Define method to query product table
class Customer extends Table 
{
  protected static $tablename = "customer";
  protected static $timestamp = TRUE;
 


  //
  static public function updateProfile(){
    $condition = [
      db_customer_id => $_SESSION['customer']['id']
    ]; 

    $data = array();
    if( isset($_POST['fName']) )
      $data[db_customer_firstName] = $_POST['fName'];
    
    if( isset($_POST['lName']) )
      $data[db_customer_lastName]  = $_POST['lName'];
    
    if( isset($_POST['tel']) )
      $data[db_customer_telephone] = $_POST['tel'];

    return self::update( $condition,$data );
  }

  //
  static public function register($email,$name){
    
    $data = [
      db_customer_email => $email,
      
    ]; 
    if( isset($name) )  $data[db_customer_lastName] = $name;
    
    return self::insert( $data );
  }

  //
  static public function findByEmail($email){
    $condition = [
      db_customer_email => $email,
    ]; 
    return self::find1record( $condition );
  }

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

    $wishlist = Customer::getWishlist();
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

    $wishlist = Customer::getWishlist();
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