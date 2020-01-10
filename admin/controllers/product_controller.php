
<?php
// Entity Class == View product pages
class ProductController extends BaseController
{
  function __construct() {
    $this->page_name = $this->page_name."/"."Products";
    $this->folder = "product";
    $this->search_bar = FALSE; 
    $this->setting = FALSE; 
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
    $p_record = product::find($_GET["id"]);

    //
    $this->view_file = "details_product_widget"; 
    $this->render(array("m_data" => $m_data,"route" => $_GET["route"],"p_record" => $p_record,"id"=>$_GET["id"]));

  }
  function edit(){
    product::edit($_GET["id"]);
    header("Location: product.php");
  }

  function insert(){
    product::insert();
    header("Location: product.php");
  }

  function delete(){
    
    // Query product from database  
    product::delete($_GET["id"]);
    header("Location: product.php");
  }

}