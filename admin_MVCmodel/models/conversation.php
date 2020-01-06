<?php

/**
 * conversation table
 */
class conversation extends table
{

  public static $tablename = "conversation";

  function insert($message){
    $arr=array(); 
    $arr[db_conversation_user] = $_SESSION['username'];
    $arr[db_conversation_bodymsg] = $message;
    return parent::insert($arr);

  }
}