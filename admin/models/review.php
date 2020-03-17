<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class review extends Table
{
  protected static $tablename = "review";

  /**
   * Get all products related to product $id
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  static function get($id){

    return self::findtablerecord(array(db_review_id => $id)); 

  }
  
  function insert(){

  }

  
  /**
   * [update reviews get infomation from GET method]
   * @return [type] [description]
   */
  function update(){
    //
    $id =  $_GET["id"];

    //
    $arr = array();
    $arr[db_review_status] = $_GET['status'] ? 1: 0;

    // Execute SQL command     
    return parent::update(array(db_review_id => $id),$arr);
  }

  function mapProductNameColumn(){
    return self::selectInnerJoin(db_review_product,array("*"),array(db_product_name));
  }

}