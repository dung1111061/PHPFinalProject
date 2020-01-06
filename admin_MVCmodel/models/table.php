<?php

/**
 *  Table on Database
 *  Example: admin
 *  id | user | password | name
 *  1  | admin| admin    | Joe
 *  ...
 *  Interface for control data in tables.
 */
abstract class Table extends DB
{
  // protected $tablename;
  public static $tablename="not defined";

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
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "select * from ".static::$tablename." WHERE ".$parameter_arr;
    echo $sql;
    return self::fetch($sql,array_values($condition_arr));
  }

  /**
   * [findtablerecord description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [2d table]                [description]
   */
  function findtablerecord($condition_arr){
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');
    
    $sql = "select * from ".static::$tablename." WHERE ".$parameter_arr;

    return self::fetchAll($sql,array_values($condition_arr));
  }

  /**
   * [delete description]
   * @param  [type] $condition_arr [key = field, value = record]
   * @return [type]                [description]
   */
  function delete($condition_arr) {
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and '); 

    $sql = "DELETE FROM ".static::$tablename." WHERE ".$parameter_arr;
    echo $sql;
    return self::execute($sql,array_values($condition_arr));
  }

  /**
   * [insert 1 record]
   * @param  [type] $arr [key = field, value = record]
   * @return [type]      [description]
   */
  function insert($arr){

    $sql = "INSERT INTO ".static::$tablename." (".implode(array_keys($arr),',').") VALUES (".implode(',', array_fill(0, count($arr), '?')).");";

    return self::execute($sql,array_values($arr));
  }

  /**
   * [update description]
   * @param  [type] $condition_arr [description]
   * @param  [type] $update_arr    [description]
   * @return [type]                [description]
   */
  function update($condition_arr,$update_arr){

    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "UPDATE ".static::$tablename." SET $parameter_update_arr WHERE ".$parameter_condition_arr;
    echo $sql;
    print_r(array_values(array_merge($update_arr,$condition_arr))) ;

    return self::execute($sql,array_values(array_merge($update_arr,$condition_arr)));
  }

}