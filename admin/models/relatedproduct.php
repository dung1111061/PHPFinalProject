<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class relatedProduct extends Table
{
  protected static $tablename = "related_product";
  public static $maximum_number = 5;
  /**
   * Get all products related to product $id
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  static function get($id){

    return self::findTableRecord(array(db_relatedproduct_product_id => $id)); 

  }
  /**
   * Insert all products related to product $id
   * @param  [type] $id              [description]
   * @param  [array 1d ] $related_product [description]
   * @return [type]                  [description]
   */
  static function insert($id,$related_product_ids = array()){
    foreach ($related_product_ids as $related_id) {
         $stm = parent::insert(array(db_relatedproduct_product_id => $id, 
                                      db_relatedproduct_related_id => $related_id));
        // verify insert successful
        if($stm->errorInfo()[2]) {
          $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
          throw new MySQLQueryException($message);
        }
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
   * @param  [array 1d] $related_product_ids [list of all new related id ]
   * @return [type]                      [description]
   */
  
  static function edit($id,$related_product_ids = array()){
    // table present products related to $id before edit database
    $previous_table = self::get($id);

    // Replace previous table by new table
      // loop each record and do delete relation not still exits
      foreach ($previous_table as $record) {
        if(!in_array($record[db_relatedproduct_related_id], $related_product_ids)) 
          self::delete(array(db_relatedproduct_product_id => $record[db_relatedproduct_product_id],db_relatedproduct_related_id => $record[db_relatedproduct_related_id]));
      }

      // found new relation and insert one
      foreach ($related_product_ids as $related_id) {
         if (!in_array($related_id, array_column($previous_table, db_relatedproduct_related_id) ))
              self::insert($id,array($related_id));
      }

    return true;
  }

}