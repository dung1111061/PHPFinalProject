<?php
/**
 *  abstract table for table on database
 *  Example: admin
 *  id | user | password | name
 *  1  | admin| admin    | Joe
 *  ...
 *  Parent class
 *  SQL command interface for control data in tables.
 *  DB interface (extends through SQL command) for connect database
 *  
 *  method:  API for query database
 *  
 */
abstract class Table extends SQLCommand
{

  protected static $timestamp = FALSE;

  /**
   * [get all data on table] 
   * @param  [type] $sql [description]
   * @param  array  $arr [description]
   * @return [2d table]      [description]
   */
  static function getAll(){
    $sql = "select * from ".static::$tablename;
    return self::fetchAll($sql);
  }

  /**
   * [find1record description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [1d record]                [record]
   */
  static function find1record($condition_arr){
    // Build SQL command
    $place_holders = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "select * from ".static::$tablename." WHERE ".$place_holders;

    //Execute
    $result = self::fetchAll($sql,array_values($condition_arr));
    if($result) return $result[0];
  }

  /**
   * [findtablerecord description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [2d table]                [description]
   */
  static function findtablerecord($condition_arr){
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
  static function delete($condition_arr) {
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and '); 

    $sql = "DELETE FROM ".static::$tablename." WHERE ".$parameter_arr;
    
    /* Debug Infomation of execute PDOstm */
    // echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    // echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    // print_r( $condition_arr); echo "<br>";
    /* Debug Infomation of execute PDOstm */

    self::$stm = self::execute($sql,array_values($condition_arr));
    return self::$stm;
  }

  /**
   * [insert 1 record]
   * @param  [1d array] $arr [data array: key = field, value = record]
   * @return [type]      [description]
   */
  static function insert($arr){

    // 2020-3-2 Put time stamp flag
    if(static::$timestamp) self::addTimeStamp($arr);

    // SQL partition
    $key = implode(array_keys($arr),',');
    $place_holders = implode(',', array_fill(0, count($arr), '?'));
    $values = array_values($arr);

    // 
    $sql = "INSERT INTO ".static::$tablename." ($key) VALUES ($place_holders);";
    
    /* Debug Infomation of execute PDOstm */
    // echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    // echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    // var_dump($arr); echo "<br>";
    /* Debug Infomation of execute PDOstm */

    //
    self::$stm = self::execute($sql,$values);
    return self::$stm;

  }

  /**
   * [update description]
   * @param  [1d array] $condition_arr [condition array:key = field, value = record]
   * @param  [1d array] $update_arr    [data array: key = field, value = record]
   * @return [type]                [stm statement]
   */
  static function update($condition_arr,$update_arr){

    // 2020-3-2 Put time stamp flag
    if(static::$timestamp) self::updateTimeStamp($update_arr);

    // Key and Placeholders of update partition
    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

    // Key and Placeholders of condition partition
    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    // Values of update and condition partition
    $values = array_values(array_merge($update_arr,$condition_arr));

    //
    $sql = "UPDATE ".static::$tablename." SET $parameter_update_arr WHERE $parameter_condition_arr";
    
    /* Debug Infomation of execute PDOstm */
    // echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    // echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    // print_r( array_merge($update_arr,$condition_arr)); echo "<br>";
    /* Debug Infomation of execute PDOstm */
    
    // execute
    self::$stm = self::execute($sql,$values);
    return self::$stm;
  }

//=========================================================================
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
  static function selectInnerJoin($foreign_key="",$field_list=array(),$primary_field_list=array() ){
    //
    list($primary_table,$primary_key) = self::getConstraint($foreign_key);
    
    //
    $sql = self::selectSQL($field_list,$primary_table,$primary_field_list ).self::innerJoin($foreign_key,$primary_key,$primary_table);
    return self::fetchAll($sql);
  }

#=================================
  static function getStoredStatement(){
      return self::$stm;
  }
  
#==================================
  /**
   * 2020-3-1 Update timestamp features
   * Update column "timestamp" for table
   * Table must be define "created_at", "updated_at" column
   * Add timestamp to data array used for executing sql command
   * Usage: Turn on property "static $timestamp"
  */
  static function updateTimeStamp(&$data_array)
  {
    $timestamp = getTimeStamp();
    $data_array[db_updated_at] = $timestamp;
  }
  static function addTimeStamp(&$data_array)
  {
    $timestamp = getTimeStamp();
    $data_array[db_created_at] = $timestamp;
  }

}