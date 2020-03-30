<?php
// Product Table
// Define method to query product table
class orderProduct extends Table 
{
  protected static $tablename = "order_product";

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