
<?php
// Entity Class == View manufacturer pages
class ManufacturerController extends BaseController
{
  function __construct() {
    $this->page_location = $this->page_location."/"."Manufacturers";
    $this->folder = "manufacturer";
     
    
    $this->setScript("manufacturer");    
  }

  function display_manufacturer_table(){
    // Query manufacturer from database  
    $m_data = manufacturer::getAll();
    $p_data = manufacturer::getAll();
    // 
    $this->view_file = "manufacturer_table";
    $this->render(array("data" => $p_data,"m_data" => $m_data));
  }

  function display_details_manufacturer_insert_widget(){

    // 
    $m_data = manufacturer::getAll();
    $this->view_file = "details_manufacturer_widget";
    $this->render(array("m_data" => $m_data,"route" => $_GET["route"]));

  }

  function display_details_manufacturer_edit_widget(){
    
    //
    $m_data = manufacturer::getAll();
    $p_record = manufacturer::find($_GET["id"]);

    //
    $this->view_file = "details_manufacturer_widget"; 
    $this->render(array("m_data" => $m_data,"route" => $_GET["route"],"p_record" => $p_record,"id"=>$_GET["id"]));

  }
  function edit(){
    //
    manufacturer::edit($_GET["id"]);
    //
    $stm = manufacturer::getStoredStatement();
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    //
    header("Location: nha-san-xuat.html");
  }

  function insert(){
    //
    manufacturer::insert();
    //
    $stm = manufacturer::getStoredStatement();
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    //
    header("Location: nha-san-xuat.html");
  }

  function delete(){
    // delete image
    $filename = MANUFACTURER_IMAGE_PATH.'/'.manufacturer::find($_GET["id"])[db_manufacturer_image];

    // Query manufacturer from database  
    manufacturer::delete($_GET["id"]);
    //
    $stm = manufacturer::getStoredStatement();
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    
    //
    delete_image($filename);

    //
    header("Location: nha-san-xuat.html");
  }

}