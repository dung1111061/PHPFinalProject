
<?php
/**
 * Entity Class == Product pages 
 * Handle business logic for each action on product page
 */
class NewController extends BaseController
{

  // Define
  function __construct() {
    $this->folder = "new";
    $this->setScript("new");
    $this->setCss("new");
  }


//============================
  function sendMail2Subscriber(){
    // 
    $new = Model_New::find( $_GET["id"] );
    
    // send html mail to subscriber
    $subscriberList = Subscriber::getAll();
    
    foreach ($subscriberList as $subscriber) {
      //
      $email_destination = $subscriber["email"];

      //
      // admin::simple_fetch( db_admin_email, $email_destination);

      // link to form to restore password
      $html_message = $new[db_new_content];

      // Sending mail
      if ( send_html_mail( $email_destination, $html_message) ) 
        echo "Sending mail successfully <br>";
      
      else 
        echo "Sending mail failed <br>";
    }
    

    // redirect to 
    redirect("new.php");
  }

//===========================================
  function insert(){
    // Update product
    $stm = Model_New::createNew($_GET["id"]);
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    
    // redirect to 
    redirect("new.php");
  }

//
  function edit(){
    // Update product
    $stm = Model_New::edit($_GET["id"]);
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    
    
    // redirect to 
    redirect("new.php");
  }


//===========================================
  function display_list(){
    // Query product from database  
    $data = Model_New::getAll(  );

    $this->view_file = "list_new";
    $this->render(array("data" => $data));
  }

  function display_createNew(){
    // Query product from database  
    $new = Model_New::getDefaultObject();
    $categories = Category::getAll();

    $this->view_file = "insert_new";
    $this->render(array("new" => $new,"categories" =>  $categories));
  }

  function display_edit(){
    
    // Query product from database  
    $new = Model_New::find( $_GET["id"] );
    $categories = Category::getAll();

    $this->view_file = "edit_new";
    $this->render(array("new" => $new,"categories" =>  $categories));

  }
}