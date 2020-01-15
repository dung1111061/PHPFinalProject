<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class relatedProduct extends Table
{
  public static $tablename = "related_product";
  public static $maximum_number = 5;
  /**
   * Get all products related to product $id
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  static function get($id){

    return self::findtablerecord(array(db_relatedproduct_product_id => $id)); 

  }
  /**
   * Insert all products related to product $id
   * @param  [type] $id              [description]
   * @param  [array 1d ] $related_product [description]
   * @return [type]                  [description]
   */
  function insert($id){

    $related_products_id = $_POST["related"];
    foreach ($related_products_id as $related_id) {
         $stm = parent::insert(array(db_relatedproduct_product_id => $id, 
                                      db_relatedproduct_related_id => $related_id));
        // verify insert successful
        //   if (!$result) return false;
        //   echo "<pre>";
        // print_r($stm->errorInfo());
    }
    return true;
  }

  /**
   * Replace by new relations
   *  Example: edit(36,(50,51,52))
   *  previous relation  || new relation  
   *  36 | 50            || 36 | 50
   *  36 | 53            || 36 | 51 
   *                     || 36 | 52
   * @param  [type] $id                  [id of product]
   * @param  [array 1d] $related_products_id [list of all new related id ]
   * @return [type]                      [description]
   */
  
  function edit($id){
    // table present products related to $id before edit database
    $previous_table = self::get($id);
    $related_products_id = $_POST["related"];

    // Replace previous table by new table
      // loop each record and do delete relation not still exits
      foreach ($previous_table as $record) {
        if(!in_array($record[db_relatedproduct_related_id], $related_products_id)) 
          self::delete(array(db_relatedproduct_product_id => $record[db_relatedproduct_product_id],db_relatedproduct_related_id => $record[db_relatedproduct_related_id]));
      }

      // found new relation and insert one
      foreach ($related_products_id as $related_id) {
         if (!in_array($related_id, array_column($previous_table, db_relatedproduct_related_id) ))
              self::insert($id,array($related_id));
      }
      

    return true;
  }

}