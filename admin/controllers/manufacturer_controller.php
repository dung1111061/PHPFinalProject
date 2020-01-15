
<?php
// Entity Class == View manufacturer pages
class ManufacturerController extends BaseController
{
  function __construct() {
    $this->page_name = $this->page_name."/"."manufacturers";
    $this->folder = "manufacturer";
    $this->search_bar = FALSE; 
    $this->setting = FALSE; 
    $this->script("manufacturer");    
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
    manufacturer::edit($_GET["id"]);
    header("Location: manufacturer.php");
  }

  function insert(){
    manufacturer::insert();
    header("Location: manufacturer.php");
  }

  function delete(){
    
    // Query manufacturer from database  
    manufacturer::delete($_GET["id"]);
    header("Location: manufacturer.php");
  }

}