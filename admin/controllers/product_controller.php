
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

  function display_details_product_insert_widget(){

    // 

    $this->view_file = "details_product_widget";
    $this->render(array("route" => $_GET["route"]));

  }

  function display_details_product_edit_widget(){
    
    //
    $p_record = product::find($_GET["id"]);

    //
    $this->view_file = "details_product_widget"; 
    $this->render(array("route" => $_GET["route"],"p_record" => $p_record,"id"=>$_GET["id"]));

  }
  function edit(){
    // Update product
    product::edit($_GET["id"]);

    // Update relation
    relatedProduct::edit($_GET["id"]);

    header("Location: product.php");
  }

  function insert(){
    $stm = product::insert();

    // Update relation
    $id = DB::getInstance()->lastInsertId();
    relatedProduct::insert($id);
    
    header("Location: product.php");
  }

  function delete(){
    
    // Query product from database  
    product::delete($_GET["id"]);
    header("Location: product.php");
  }

  function test() {
    $this->view_file = "test-multiple-selection"; 
    $this->render();
  }

}