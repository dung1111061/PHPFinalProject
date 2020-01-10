
<?php
// Entity Class == View product pages
class ProfileController extends BaseController
{
  function __construct() {
    $this->page_name = $this->page_name."/"."Profile";
    $this->folder = "profile";
    $this->search_bar = FALSE; 
    $this->setting = FALSE; 
    $this->script("profile");    
  }

  function show() {
  	$this->view_file = "profile";
  	$this->render();
  } 

}