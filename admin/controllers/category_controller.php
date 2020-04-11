
<?php
// Entity Class == View category pages
class CategoryController extends BaseController
{
  function __construct() {
    $this->folder = "category";
    $this->setScript("category");    
  }

  function display_category_table(){

    $c_data = Category::getFormatTable();


    $this->view_file = "category_table";
    $this->render(array("data" => $c_data));
  }

  function display_details_category_insert_widget(){

    // 

    $this->view_file = "details_category_widget";

    $this->render(array("route" => $_GET["route"]));

  }

  function display_details_category_edit_widget(){
    
    //
    $c_record = Category::find($_GET["id"]);

    // 
    $this->view_file = "details_category_widget"; 
    $this->render(array("route" => $_GET["route"],"c_record" => $c_record,"id"=>$_GET["id"]));

  }
  function edit(){
    // Update category
    Category::edit($_GET["id"]);
    //
    $stm = Category::getStoredStatement();
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    //
    header("Location: category.php");
  }

  function insert(){
    //
    Category::insert();
    //
    $stm = Category::getStoredStatement();
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    //
    header("Location: category.php");
  }

  function delete(){
    
    // Query category from database  
    echo "Not support yet";
    // Category::delete($_GET["id"]);
    // header("Location: category.php");
  }


}