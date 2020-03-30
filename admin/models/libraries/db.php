<?php
/**
 * Connection to Database
 * Object of DB table should execute SQL command via class table 
 * All method must be static method as no $this pointer (record) is used in there 
 */
class DB
{
  public static $stm = NULL;
  private static $instance = NULL;
  public static function getInstance() {
    if (!isset(self::$instance)) {
      try {
        self::$instance = new PDO('mysql:host=localhost;dbname='.dbname, username, password);
        self::$instance->exec("SET NAMES 'utf8'");
       
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
    return self::$instance;
  }
   
// New features
// 2020/01/04
// API for execute sql command

  /**
   * [Executes a prepared statement]
   * @param  [type] $sql [description]
   * @param  array  $parameter [description]
   * @return [PDOstatement]   [ statement or result of execute TRUE on success or FALSE on failure. ]
   */
   static function execute($sql,$parameter=array()){
    $stm  = self::getInstance()->prepare($sql);
    $stm->execute($parameter);
    
    return $stm; 
  }

/** [Execute sql command and fetchAll data ( table ) ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $parameter parameter array for PDO->execute()
 * @return PDO->fetchAll()
 */
   static function fetchAll($sql,$parameter=array()){
    return self::execute($sql,$parameter)->fetchAll(PDO::FETCH_ASSOC);
  }

/** [Execute sql command and fetch data ( record ) ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $parameter parameter array for PDO->execute()
 * @return PDO->fetch()
 */
   static function fetch($sql,$parameter=array()){
    return self::execute($sql,$parameter)->fetch();
  }
  
}