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
    $conversations   = conversation::conversations();

    $avatar_url = AVATAR_IMAGE_PATH."default.png";
    $username = "Bob Doe";
    $time = "6 min";
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip; dynamic page";
    ob_start();
    include_once 'views/' . $this->folder . '/' . 'reviews_widget_tab.php';
    $reviews = ob_get_clean();
  	
    $this->render(array("num_comments" => 1,"num_reviews" => 2,"per_commentreviews" => 3,"conversations" => $conversations, 'reviews' => $reviews  ));
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