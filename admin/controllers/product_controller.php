
<?php
/**
 * Entity Class == Product pages 
 * Handle business logic for each action on product page
 */
class ProductController extends BaseController
{
  // Define
  function __construct() {
    $this->page_location = $this->page_location."/"."Products";
    $this->folder = "product";
    $this->setScript("product");  
    $this->setCss("product");  
  }

  function display_product_table(){
    // Query product from database  
    $m_data = manufacturer::getAll();
    $p_data = product::getAll();

    // Preprocessing data
    product::recalculatePrice($p_data);
    product::formatProduct2UserApp($p_data);

    $this->view_file = "product_table";
    $this->setScript("product_table"); 
    $this->render(array("data" => $p_data,"m_data" => $m_data));
  }

  function display_details_product_insert_widget(){
    
    // default record 
      $p_record = product::getDefaultObject();
      
    // 
    $p_table = product::getAll();
    $this->view_file = "details_product_widget";

    //
    $m_data = manufacturer::getAll();

    //
    $c_data = category::getAll();

    // Reused view module of edit widget, keep in mind if no pass selected product meaning record related variable is null
    $this->render(array("action" => $_GET["action"],"p_data"=>$p_table,"p_record"=>$p_record,"m_data"=>$m_data,"c_data"=>$c_data));

  }

  function display_details_product_edit_widget(){
    
    // pass Data to fomr
    $p_record = product::getProduct2Form($_GET["id"]);

    //
    $p_table = product::getAll();
    //
    $related_products = relatedProduct::get($_GET["id"]);
    
    //
    $m_data = manufacturer::getAll();
    //
    $c_data = category::getAll();

    //
    $this->view_file = "details_product_widget"; 
    $this->render(array("action" => $_GET["action"],"p_record" => $p_record,"id"=>$_GET["id"],"related_products"=>$related_products,"p_data"=>$p_table,"m_data"=>$m_data,"c_data"=>$c_data));

  }
  function edit(){
    // Update product
    $stm = product::edit($_GET["id"]);
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }

    // Update relation
    relatedProduct::edit($_GET["id"],$_POST["related"]);
    
    // redirect to 
    redirect("san-pham.html");
  }

  function insert(){
    $stm = product::insert();

    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }

    // Update relation
    $id = DB::getInstance()->lastInsertId();
    relatedProduct::insert($id,$_POST["related"]);
    
    // redirect to 
    redirect("san-pham.html");
  }

  function delete(){
    verify_privilege(privilege::administrator);
    //
    $filename = PRODUCT_IMAGE_PATH.'/'.product::find($id)[db_product_image];

    // Query product from database  
    $stm = product::delete($_GET["id"]);
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }

    //
    delete_image($filename);

    // echo "<!DOCTYPE html>";
    // echo "testing text before header funtion";
    // redirect to 
    redirect("san-pham.html");
  }


}