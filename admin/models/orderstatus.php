<?php
// Product Table
// Define method to query product table
class OrderStatus extends Table 
{
  protected static $tablename = "order_status";
  protected static $timestamp = true;

 static public function createNew($data){
 	return self::insert($data);
 }

 static public function checkDone($order){
	//
	$condition = [
		db_orderStatus_order  => $order,
		db_orderStatus_status => ORDER_STATUS::done
	];
	
	//
 	if ( self::find1record( $condition ) )
 		return true;
 	else
 		return false;
 }

 static public function getStatus ($order){
 	$condition = [
 		db_orderStatus_order => $order,
 		db_orderStatus_flag  => 0,
 	];
 	return self::find1record( $condition )[db_orderStatus_status];
 }

 static public function updateOldStatus($order){
 	$condition = [
 		db_orderStatus_order => $order,
 		db_orderStatus_flag  => 0,
 	];

 	$data = [
 		db_orderStatus_flag  => 1,
 	];

 	//
 	return self::update($condition,$data);
 }

 // static public function updateShippingStatus($order){
 // 	$condition = [
 // 		db_orderStatus_order => $order
 // 	];

 // 	$data = [
 // 		db_orderStatus_status => ORDER_STATUS::shipping
 // 	]; 
 // 	return self::update( $condition,$data );
 // }
 
 // static public function updateDoneStatus($order){
 // 	$condition = [
 // 		db_orderStatus_order => $order
 // 	];

 // 	$data = [
 // 		db_orderStatus_status => ORDER_STATUS::done
 // 	]; 
 // 	return self::update( $condition,$data );
 // }

}