
<?php
/**
 * Entity Class == Product pages 
 * Handle business logic for each action on product page
 */
class TestController extends BaseController
{
  function __construct() {
    $this->page_location = $this->page_location."/"."Products";
    $this->folder = "test";
    $this->setScript("test");    
  }

  function testing_chosen_plugin(){
    // Query product from database  
    
    //
    $this->view_file = "test"; 
    $this->render();
  }
}