
<?php
// Entity Class == View product pages
class ProfileController extends BaseController
{
  function __construct() {
    $this->folder = "profile";
    $this->setScript("profile");    
  }

  function show() {
  	$this->view_file = "profile";
  	$this->render();
  } 

}