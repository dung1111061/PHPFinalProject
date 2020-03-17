<?php

/**
 * conversation table
 */
class conversation extends Table
{

  protected static $tablename = "conversation";

  function insert($message){
    $arr=array(); 
    $arr[db_conversation_username] = $_SESSION['username'];
    $arr[db_conversation_bodymsg] = $message;
    $now = new DateTime("",new DateTimeZone(TIME_ZONE));
    $arr[db_conversation_time] = $now->format("Y-m-d H:i:s");
    return parent::insert($arr);
  }

  function conversations(){
  	return self::selectInnerJoin(db_conversation_username,array(db_conversation_bodymsg,db_conversation_time),array(db_admin_realname,db_admin_privilege,db_admin_avatar));
  }  
  function getConversation($id){
    // get all conversation
    $table = self::selectInnerJoin(db_conversation_username,array(db_conversation_id,db_conversation_bodymsg,db_conversation_time),array(db_admin_realname,db_admin_privilege,db_admin_avatar));

    
    $value = $table[array_search($id, array_column($table, db_conversation_id))];
    return $value;
  }

  function getlastInsertId(){
    $last_id = self::getInstance()->lastInsertId();
    return $last_id;
  }


}