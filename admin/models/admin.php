<?php
class admin
{

  static function getAll()
  {
    $conn = DB::getInstance();   
    $sql = "SELECT * FROM admin";
    $stm = $conn->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  static function simple_fetch($field,$value)
  {
    $conn = DB::getInstance();   
    $sql = "SELECT * FROM `admin` WHERE ".$field." = ?";
    $stm =$conn->prepare($sql); 
    $stm->execute(array($value));
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function fetch($arr)
  {
    // arr: key = field, value = record
    $conn = DB::getInstance();   
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($arr), array_fill(0, count($arr), '?')),' and ');
    $sql = "SELECT * FROM `admin` WHERE ".$parameter_arr;
    $stm =$conn->prepare($sql); 
    $stm->execute(array_values($arr));
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  static function insert($arr)
  {
    // arr: key = field, value = record
    $conn = DB::getInstance();   
    $sql = "INSERT INTO `admin` (".implode(array_keys($arr),',').") VALUES (".implode(',', array_fill(0, count($arr), '?')).");";

     // // execute SQL command
    $stm = $conn->prepare($sql);
    return $stm->execute(array_values($arr));
  }

  static function update($condition_arr,$update_arr) {

    $conn = DB::getInstance(); 
    // Build SQL command
    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    $sql = "UPDATE `admin` SET $parameter_update_arr WHERE ".$parameter_condition_arr;
    echo $sql;
    print_r(array_values(array_merge($update_arr,$condition_arr))) ;
    
    // execute SQL command
    $stm = $conn->prepare($sql);
    return $stm->execute(array_values(array_merge($update_arr,$condition_arr)));

  }

}