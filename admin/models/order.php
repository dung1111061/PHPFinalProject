<?php
// Product Table
// Define method to query product table
class order extends Table 
{
  protected static $tablename = "order_details";

 protected getDatafromForm(){
 	$data = [
 		
 	];
 	return $data
 }

 public createNew(){
 	$data = self::getDatafromForm();
 	return self::insert($data);
 }
  
}