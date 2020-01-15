<?php
/**
 * Build Atomic SQL command
 */
abstract class SQLCommand extends DB
{
  // protected $tablename;
  public static $tablename = "not defined";
  public static $primary_key = "not defined";

  
  function selectSQL($field_list=array(),$primary_table="",$primary_field_list=array()){
      if(empty($field_list)){
        $fields="*";

      } else {
        // convert to string fields
        $fields = implode( array_map(function($field) { return static::$tablename.".$field"; }, $field_list), ',');
        
        if(!empty($primary_field_list) && !empty($primary_table)){
          array_walk($primary_field_list,function(&$field,$key,$prefix) { $field = $prefix.".$field"; }, 
                      $primary_table);
          $fields = $fields .",". implode( $primary_field_list, ',');
        }

      }

      return "SELECT $fields FROM ".static::$tablename;
  }

  function innerJoin($foreign_key,$primary_key,$primary_table){
    $constraint = " INNER JOIN $primary_table ON "
                   .static::$tablename.".$foreign_key = $primary_table.$primary_key";
    return $constraint;
  }

  /**
   * [getStructureTable description]
   * @return [type] [description]
   */
  function getStructureTable(){
    $sql ="Select * FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME LIKE '".static::$tablename."' AND TABLE_SCHEMA = 'quanlibanhang_offical' AND REFERENCED_TABLE_NAME IS NOT NULL";
    return self::fetchAll($sql);
  }

  /**
   * [getConstraint description]
   * @param  [type] $foreign_key [description]
   * @return [type]              [description]
   */
  function getConstraint($foreign_key){
   $structure = self::getStructureTable();
   $element = $structure[array_search($foreign_key, array_column($structure, 'COLUMN_NAME'))];
   return array($element["REFERENCED_TABLE_NAME"],$element["REFERENCED_COLUMN_NAME"]);
  }

}

/**
 *  Table on Database
 *  Example: admin
 *  id | user | password | name
 *  1  | admin| admin    | Joe
 *  ...
 *  SQL command interface for control data in tables.
 */
abstract class Table extends SQLCommand
{
  // protected $tablename;
  public static $tablename = "not defined";
  public static $primary_key = "not defined";

  /**
   * [get all data on table] 
   * @param  [type] $sql [description]
   * @param  array  $arr [description]
   * @return [2d table]      [description]
   */
  function getAll(){
    $sql = "select * from ".static::$tablename;
    return self::fetchAll($sql);
    
  }

  /**
   * [find1record description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [1d record]                [record]
   */
  function find1record($condition_arr){
    // Build SQL command
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "select * from ".static::$tablename." WHERE ".$parameter_arr;

    //Execute
    return self::fetch($sql,array_values($condition_arr));
  }

  /**
   * [findtablerecord description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [2d table]                [description]
   */
  function findtablerecord($condition_arr){
    // Build SQL command
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "select * from ".static::$tablename." WHERE ".$parameter_arr;

    return self::fetchAll($sql,array_values($condition_arr));
  }

  /**
   * [delete description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [type]                [stm statement]
   */
  function delete($condition_arr) {
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and '); 

    $sql = "DELETE FROM ".static::$tablename." WHERE ".$parameter_arr;
    return self::execute($sql,array_values($condition_arr));
  }

  /**
   * [insert 1 record]
   * @param  [1d array] $arr [key = field, value = record]
   * @return [type]      [description]
   */
  function insert($arr){

    $sql = "INSERT INTO ".static::$tablename." (".implode(array_keys($arr),',').") VALUES (".implode(',', array_fill(0, count($arr), '?')).");";

    return self::execute($sql,array_values($arr));
  }

  /**
   * [update description]
   * @param  [1d array] $condition_arr [key = field, value = record]
   * @param  [1d array] $update_arr    [key = field, value = record]
   * @return [type]                [stm statement]
   */
  function update($condition_arr,$update_arr){
    // Build SQL command
    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "UPDATE ".static::$tablename." SET $parameter_update_arr WHERE ".$parameter_condition_arr;
    echo $sql;
    echo "<pre>";
    print_r(array_merge($update_arr,$condition_arr));
    // execute
    return self::execute($sql,array_values(array_merge($update_arr,$condition_arr)));
  }

  /**
   * [selectInnerJoin for select field additional inner join other table ]
   * WARNING: class not available yet
   * @param  array  $field_list         [description]
   * @param  string $foreign_key        [description]
   * @param  array  $primary_field_list [description]
   * @param  string $primary_key        [description]
   * @param  string $primary_table      [description]
   * @return [2d table]                     [datas]
   */
  function selectInnerJoin($foreign_key="",$field_list=array(),$primary_field_list=array() ){
    //
    list($primary_table,$primary_key) = self::getConstraint($foreign_key);
    
    //
    $sql = self::selectSQL($field_list,$primary_table,$primary_field_list ).self::innerJoin($foreign_key,$primary_key,$primary_table);
    return self::fetchAll($sql);
  }
}