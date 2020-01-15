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

    //
    ob_start();
    include_once 'views/' . $this->folder . '/' . 'statistical_info.php';
    $statistical_info = ob_get_clean();

    //
    $conversations   = conversation::conversations();

    //
    $tasks           = admin::getAll();
    ob_start();
    include_once 'views/' . $this->folder . '/' . 'tasks_widget_tab.php';
    $tasks = ob_get_clean();

    //
    $users           = admin::getAll();
    ob_start();
    include_once 'views/' . $this->folder . '/' . 'members_widget_tab.php';
    $members = ob_get_clean();

    //
    ob_start();
    include_once 'views/' . $this->folder . '/' . 'reviews_widget_tab.php';
    $reviews = ob_get_clean();
  	
    $this->render(array("statistical_info" => $statistical_info,"conversations" => $conversations, 'tasks' => $tasks, 'reviews' => $reviews, 'members' => $members  ));
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