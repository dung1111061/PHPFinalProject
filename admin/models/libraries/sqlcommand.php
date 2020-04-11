<?php
/**
 * Lớp hỗ trợ build SQL query
 * build struture of SQL commands, support for advanced SQL command like selectInnerJoin
 * Instead of multiple inheritance for table class, SQLCommand extends DB class
 * All method must be static method as no $this pointer (record) is used in there
 */
abstract class SQLCommand extends DB
{

  protected static $tablename = "not defined";
  protected static $primary_key = "not defined";
  
  static function selectSQL($field_list=array(),$primary_table="",$primary_field_list=array()){
      //
      if(empty($field_list)){
        $fields="*";

      } else {
        // 
        $fields = implode( array_map(function($field) { return static::$tablename.".$field"; }, $field_list), ',');
        
        // select more field of external table
        if( !empty($primary_field_list) && !empty($primary_table) ){
          array_walk($primary_field_list,function(&$field,$key,$prefix) { $field = $prefix.".$field"; }, 
                      $primary_table);
          $fields = $fields .",". implode( $primary_field_list, ',');
        }

      }

      return "SELECT $fields FROM ".static::$tablename;
  }

  static function innerJoin($foreign_key,$primary_key,$primary_table){
    $constraint = " INNER JOIN $primary_table ON "
                   .static::$tablename.".$foreign_key = $primary_table.$primary_key";
    return $constraint;
  }
}