<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class Subscriber extends Table
{
  protected static $tablename = "subscriber";
  protected static $timestamp = TRUE;

  static function find($email){
    $condition= [
      'email' => $email,
      'status' => 1
    ];
    
    return self::find1record($condition);
  }

}