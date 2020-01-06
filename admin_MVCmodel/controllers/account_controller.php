
<?php
// Entity Class == View product pages
class AccountController 
{

  function __construct() {

  }

  static function login($action) {
    //

    if(isset($_COOKIE["privilege_user"])) { // cookie of login info has been found
      
      $_SESSION['privilege_user'] = $_COOKIE["privilege_user"];

    } 

    //
    if(!isset($_SESSION['privilege_user'])) { // session has been login before
      if ($action === "verify_login") {
        self::verify_login();

      } elseif ($action === "restore_mail") {
        self::restore_mail();

      } elseif ($action === "register") {
        self::register();
      } else {
        self::display_login();

      }
      exit();
    }
  }
  
  function display_login(){
    // Query product from database  
    require_once('views/account/login.php');

  }
  
  function verify_login() {
    if($_POST["user"] && $_POST["passwd"]) {  
      $record = admin::fetch(array(db_admin_username => $_POST["user"], db_admin_password => sha1($_POST["passwd"]) ) );
      if(!empty($record) ){
        echo LOGIN_SUCCESS_MESSAGE;
        $_SESSION['privilege_user'] = $record[db_admin_privilege];
        $_SESSION['name'] = $record[db_admin_firstname];
        $_SESSION['username'] = $record[db_admin_username];
        if($_POST["login_remember"]) setcookie('privilege_user', $record[db_admin_privilege], time() + 3600,"/"); // save authenticate user for 1 hour
      } else {
        echo LOGIN_FAILED_MESSAGE;
      }
      // echo "<pre>";
      // print_r($record);
      header('Location: index.php');
    }

  }

  function restore_mail(){
    $email_source = SERVER_MAIL;
    $email_destination = $_POST["restore_email"];

    // link to form to restore password
    $data = array("link" => SERVER_LOCATION."/function/restore_form.php?email=$email_destination");

    // content html
    $file = "views/account/restore_password_email.php"; 

    // Sending mail
    if (send_html_mail($email_source, $email_destination, $data, $file)) {echo "Sending mail successfully";}
    else echo "Sending mail failed";

    //
    require_once('views/account/back2login.php');
  }

  function restore () {
    admin::update(array(db_admin_email => $_GET["email"]),array(db_admin_password => sha1($_POST["passwd"])));
    require_once('views/account/back2login.php');

  }

  function register() {
    $message = "";
    // Insert new account
    $arr=array(); 
    $arr[db_admin_username] = $_POST['user'];
    $arr[db_admin_password] = sha1($_POST['passwd']);
    $arr[db_admin_email] = $_POST['email'];
    $arr[db_admin_privilege] = privilege::no_actived;
    admin::insert($arr);
    
    // active account
    $email_source = SERVER_MAIL;
    $email_destination = $_POST['email'];

    // link to form active email
    $data = array("link" => SERVER_LOCATION."/function/active_email_form.php?email=$email_destination");

    // content html
    $file = "views/account/active_email.php"; 

    if (send_html_mail($email_source, $email_destination, $data, $file)) {echo "Sending mail successfully";}
    else echo "Sending mail failed";

    header('Location: index.php');

  }

}