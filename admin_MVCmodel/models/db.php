<?php
/**
 * Connection to Database
 */
class DB
{

  private static $instance = NULl;
  public static function getInstance() {
    if (!isset(self::$instance)) {
      try {
        self::$instance = new PDO('mysql:host=localhost;dbname='.dbname, username, password);
        self::$instance->exec("SET NAMES 'utf8'");
        // if (ERRMODE['debug']) self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
    return self::$instance;
  }
   
// New features
// 2020/01/04
// Interfaces for sql command

  /**
   * [execute description]
   * @param  [type] $sql [description]
   * @param  array  $arr [description]
   * @return [PDOstatement]      [description]
   */
   function execute($sql,$arr=array()){
    $stm  = self::getInstance()->prepare($sql);
    $stm->execute($arr);
    return $stm;
  }

/** [Execute sql command and fetchAll data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $arr parameter array for PDO->execute()
 * @return PDO->fetchAll()
 */
   function fetchAll($sql,$arr=array()){
    return self::execute($sql,$arr)->fetchAll();
  }

/** [Execute sql command and fetch data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $arr parameter array for PDO->execute()
 * @return PDO->fetch()
 */
   function fetch($sql,$arr=array()){
    return self::execute($sql,$arr)->fetch();
  }
/** [Execute sql command and fetch data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $arr parameter array for PDO->execute()
 * @return PDO->rowCount()
 */
   function getRowCount($sql,$arr=array()){
    return self::execute($sql,$arr)->rowCount();
  }
  
}