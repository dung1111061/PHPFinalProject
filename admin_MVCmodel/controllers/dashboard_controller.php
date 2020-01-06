<?php

class DashboardController extends BaseController
{
  function __construct() {
    $this->page_name = $this->page_name."/"."Dashboard";
    $this->folder = "dashboard";
    $this->search_bar = FALSE; 
    $this->setting = FALSE; 
    $this->script("dashboard");    
  }
  function show() {
  	$this->view_file = "dashboard";
    $conversations   = conversation::getAll();
  	$this->render(array("num_comments" => 1,"num_reviews" => 2,"per_commentreviews" => 3,"conversations" => $conversations  ));
  }

  /**
   * [comment ]
   * @return [type] [description]
   */
  function sendmsg(){
    conversation::insert();
    $this->show();
  }
  

}