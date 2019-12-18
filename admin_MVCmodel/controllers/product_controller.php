
<?php
// Entity Class == View product pages
class ProductController extends BaseController
{
  function __construct() {
    $this->page_path = "Home\ Product";
    $this->folder = "product";
    $this->search_bar = FALSE; 
    $this->script("product");    
  }

  function display_product_table(){
    // Query product from database  
    $m_data = manufacturer::getAll();
    $p_data = product::getAll();
    // 
    $this->view_file = "product_table";
    $this->render(array("data" => $p_data,"m_data" => $m_data));
  }

  function insert_display_details_product(){

    // 
    $m_data = manufacturer::getAll();
    $this->view_file = "details_product_widget";
    $this->render(array("m_data" => $m_data,"route" => $_GET["route"]));

  }

  function edit_display_details_product(){

    //
    $m_data = manufacturer::getAll();
    $p_record = product::find($_GET["name"]);

    //
    $this->view_file = "details_product_widget"; 
    $this->render(array("m_data" => $m_data,"route" => $_GET["route"],"p_record" => $p_record));

  }
  function edit(){

    // Query product from database  
    product::edit($_GET["origin_name"]);
    header("Location: index.php");
  }

  function insert(){

    // Query product from database  
    product::insert();
    header("Location: index.php");
  }

  function delete(){

    // Query product from database  
    product::delete($_GET["name"]);
    header("Location: index.php");
  }

}