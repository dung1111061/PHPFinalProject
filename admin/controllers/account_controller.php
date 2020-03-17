
<?php
/**
 *  AccountController is a controller at bootstraping which always called in any request, used for authenticate user.
 *  
 */
class AccountController 
{

  function __construct() {

  }

  /**
   * Note: Migrate from login module 29/2/2020 
   * [authenticate: routing for account controller]
   * @param  [type] $action [Note: naming is not duplicate to another actions of any controller]
   * @return [type]         [whether user is authenticated or not]
   */
  public function authenticate($action) {
    
    // Whether authenticate data of user has been save or not
      // Start session on server
      if (!isset($_SESSION)) session_start();

      // get data of lasted time login from strored cookies.
      // This feature is on demo pharse.
      // if(isset($_COOKIE["privilege_user"])) { // cookie of login info has been found
        
      //   $_SESSION['privilege_user'] = $_COOKIE["privilege_user"];

      // } 

      if(isset($_SESSION['privilege_user'])) { // Query session data to confirm user has been login yet.
        return TRUE; // User is authenticated.
      }

      // If no authenticate, routing to login modules
      // Routes for login page
      if ($action === "verify_login") {
        self::verify_login();

      } elseif ($action === "restore_mail") {
        self::restore_mail();

      } elseif ($action === "register") {
        self::register();

      } else { // defaul action is render login page
        $this->display_login();

      }
      return FALSE; // User is not authenticated.
  }
  
  function display_login(){
    // action default always be called
    // Login page contains 3 view partitions: Login, Restore, Register
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
        // if($_POST["login_remember"]) setcookie('privilege_user', $record[db_admin_privilege], time() + 3600,"/"); // save authenticate user for 1 hour
      } else {
        echo LOGIN_FAILED_MESSAGE;
      }

      redirect("trang-chu.html");
    }

  }

  function restore_mail(){
    $email_source = SERVER_MAIL;
    $email_destination = $_POST["restore_email"];

    // link to form to restore password
    $data = array("link" => HTTP_SERVER."/function/email/restore_form.php?email=$email_destination");

    // content html
    $file = "views/account/restore_password_email.php"; 

    // Sending mail
    if (send_html_mail($email_source, $email_destination, $data, $file)) {
      echo "Sending mail successfully";
    }
    else echo "Sending mail failed";

    //
    require_once('views/account/back2login.php');
  }

  function restore () {
    
    //
    admin::update(array(db_admin_email => $_GET["email"]),array(db_admin_password => sha1($_POST["passwd"])));

    //
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
    $data = array("link" => HTTP_SERVER."/function/email/active_email_form.php?email=$email_destination");

    // content html
    $file = "views/account/active_email.php"; 

    if (send_html_mail($email_source, $email_destination, $data, $file)) {echo "Sending mail successfully";}
    else echo "Sending mail failed";

    redirect("trang-chu.html");


  }

}