
<?php
// Entity Class == View manufacturer pages
class ReviewController extends BaseController
{
  function __construct() {

    $this->folder = "review";
    $this->setScript("review");    
    $this->setCss("review");  
  }



  /**
   * Main page of reviews management application
   * @return [type] [description]
   */
  function show(){
    
    $r_data = Review::getPending();
    
    $this->view_file = "review";
    $this->render(
      array("reviews" => $r_data)
    );
  }

  function showApproved(){
    
    $r_data = Review::getApproved();
    
    $this->view_file = "reviewisdone";
    $this->render(
      array("reviews" => $r_data)
    );
  }

  function showRejected(){
    
    $r_data = Review::getRejected();
    
    $this->view_file = "reviewisdone";
    $this->render(
      array("reviews" => $r_data)
    );
  }  

  function approve(){
    $review = $_GET["id"];
    $product = Review::find($review)[db_review_product];

    //
    $stm = Review::approve($review);
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }
    //
    $reviews = Review::getApprovedByProduct($product);
    $rank = array_sum( array_column($reviews, db_review_rank) )/count($reviews);
    //
    $stm = product::updateRating($product,$rank);
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }
    //
    echo "1";
  }

  function reject(){
    //
    $stm = Review::reject($_GET["id"]);
    //
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }
    //
    echo "1";
  }

}