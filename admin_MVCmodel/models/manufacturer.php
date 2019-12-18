<?php


class manufacturer
{

  function __construct($id, $title, $content)
  {

  }
  static function getAll()
  {
    $conn = DB::getInstance();   
    $manufacturer_sql = "SELECT * FROM manufacturer";
    $m_stm = $conn->query($manufacturer_sql);
    return $m_stm->fetchAll(PDO::FETCH_ASSOC);
  }
}