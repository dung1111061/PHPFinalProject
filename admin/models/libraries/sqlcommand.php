<?php
/**
 * build struture of SQL commands, support for advanced SQL command like selectInnerJoin
 * Instead of multiple inheritance for table class, SQLCommand extends DB class
 * All method must be static method as no $this pointer (record) is used in there
 */
abstract class SQLCommand extends DB
{

  protected static $tablename = "not defined";
  protected static $primary_key = "not defined";
  
  static function selectSQL($field_list=array(),$primary_table="",$primary_field_list=array()){
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

  static function innerJoin($foreign_key,$primary_key,$primary_table){
    $constraint = " INNER JOIN $primary_table ON "
                   .static::$tablename.".$foreign_key = $primary_table.$primary_key";
    return $constraint;
  }

  /**
   * [getInformationSchema get database stuture information of quanlibanhang_offical]
   * @param  [type] $information_table [Table in information_schema database ]
   * @param  [type] $condition         [condition defined as string]
   * @return [type]                    [Table in information_schema database]
   */
  static function getInformationSchema($information_table,$condition=""){
    $sql ="Select * FROM INFORMATION_SCHEMA.$information_table WHERE TABLE_NAME LIKE '".static::$tablename."' AND TABLE_SCHEMA = 'quanlibanhang_offical' $condition";
    return self::fetchAll($sql);
  }

  /**
   * [getConstraint description]
   * @param  [type] $foreign_key [description]
   * @return [type]              [description]
   */
  static function getConstraint($foreign_key){
    $condition = "AND REFERENCED_TABLE_NAME IS NOT NULL";
    $structure = self::getInformationSchema('KEY_COLUMN_USAGE',$condition);
    $element   = $structure[array_search($foreign_key, array_column($structure, 'COLUMN_NAME'))];
    return array($element["REFERENCED_TABLE_NAME"],$element["REFERENCED_COLUMN_NAME"]);
  }

  /**
   * [getDefaultObject description]
   * @return [type] [description]
   */
  static function getDefaultObject(){
    $defaults = self::getInformationSchema('Columns');
    return array_column($defaults, 'COLUMN_DEFAULT', 'COLUMN_NAME');
  }

}