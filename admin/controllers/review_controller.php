
<?php
// Entity Class == View manufacturer pages
class ReviewController extends BaseController
{
  function __construct() {

    $this->folder = "review";
    $this->setScript("review");    
  }

  /**
   * Main page of reviews management application
   * @return [type] [description]
   */
  function show(){
    
    $r_data = review::get();
    
    $this->view_file = "review";
    $this->render(array("reviews" => $r_data));
  }

  function updateStatus(){
    //
    $id =  $_GET["id"];
    
    review::audit($id);

    //
    header("Location: review.php");
  }

}