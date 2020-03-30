<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class review extends Table
{
  protected static $tablename = "review";

  
  /**
   * [update reviews get infomation from GET method]
   * @return [type] [description]
   */
  static function audit($id){
    
    //
    $arr = array();
    $arr[db_review_status] = $_GET['status'] ? 1: 0;

    // Execute SQL command     
    return parent::update(array(db_review_id => $id),$arr);
  }

  static function get(){
    return self::selectInnerJoin(db_review_product,array("*"),array(db_product_name));
  }

}