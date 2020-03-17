
<?php
// Entity Class == View manufacturer pages
class ReviewController extends BaseController
{
  function __construct() {
    $this->page_location = $this->page_location."/"."Reviews";
    $this->folder = "review";
     
    $this->setScript("review");    
  }

  /**
   * Main page of reviews management application
   * @return [type] [description]
   */
  function show(){
    
    // Query manufacturer from database  
    // $r_data = review::getAll();
    // array_walk($r_data, function(&$record){
    //   $record['product'] = product::find($record[db_review_product])[db_product_name]; 
    // });

    $r_data = review::mapProductNameColumn();
     // echo"<pre>";print_r($r_data); exit();
    
    $this->view_file = "review";
    $this->render(array("reviews" => $r_data));
  }

  function updateStatus(){
    
    review::update();

    //
    header("Location: review.php");
  }

}