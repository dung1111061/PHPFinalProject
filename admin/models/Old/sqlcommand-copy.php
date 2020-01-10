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