<?php
// Product Table
// Define method to query product table
class cart extends Table 
{
  protected static $tablename = "cart";
  protected static $timestamp = TRUE;
 
  
  static function getByCustomer($customer){
    $data = [
        db_cart_customer => $customer,
    ];

    return self::findtablerecord($data);
  }

  /**
   * [add add product to table cart]
   * @param [type] $product [description]
   * return: statement
   */
  static public function add($product) {
    //
    $data = [
        db_cart_customer => $_SESSION["customer"]["id"],
        db_cart_product => $product,
    ]; 
    //
    $record = self::find1record($data);
    //
    // if(no allow add product) return self::$stm;
    //
    if($record){
      $quantity = $record[db_cart_quantity] + 1;
      return self::update( $data,array(db_cart_quantity => $quantity) );
    } 
    //
    $data[db_cart_quantity] = 1;
    return self::insert( $data );
  }

  static public function remove($product) {
    $data = [
        db_cart_customer => $_SESSION["customer"]["id"],
        db_cart_product => $product,
    ]; 
    $record = self::find1record($data);
    $quantity = $record[db_cart_quantity];

    if( $quantity > 1){
      $quantity = $quantity - 1;
      return self::update( $data,array(db_cart_quantity => $quantity) );
    } else{
      return self::delete( $data );
    }
  }

}