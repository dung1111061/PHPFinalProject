
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
    // Whether authenticate data of user has been save or not
    // return true if has authenticate data other return false
  public function authenticate($action) {
      //
      if(!isset($_SESSION)) session_start();

      // read cookie of authentication firstly
      if( isset($_COOKIE["privilege_user"]) ){ 
        $_SESSION['privilege_user'] = $_COOKIE["privilege_user"];
        $_SESSION['name']           = $_COOKIE["name"];
        $_SESSION['username']       = $_COOKIE["username"];
      } 

      if( isset($_SESSION['privilege_user']) ){ // User is authenticated.
        return TRUE; 
      }

      // Dang nhap tai khoan nguoi quan li website
      if ($action === "login"){
        //
        if ( self::login() ) 
          redirect("trang-chu.html");
        //
        echo "Sai mat khau hoac ten nguoi dung <br>";
        echo "Click vao link ve <a href='index.php'> login </a>";
        return false;
      } 
      
      if ($action === "restore_mail"){
        self::restore_mail();
        return false;
      }
 

      if ($action === "restoreForm"){
        self::restoreForm();
        return false;
      }

      if ($action === "restorePassword"){
        self::restorePassword();
        return false;
      }

      if ($action === "register"){
        self::register();
        return false;
      }

      if($action == "verify"){
        self::verifyRegisterAccount();
        return false;
      }

      if ($action === "doActive"){
        self::doActive();
        return false;
      }

      self::display_login();
      return false;
  }
  
  function display_login(){
    // action default always be called
    // Login page contains 3 view partitions: Login, Restore, Register
    require_once('views/account/login.php');

  }
  
  function login() {

    if($_POST["user"] && $_POST["passwd"]) {  
       // verify login data
      $record = admin::fetch(array(db_admin_username => $_POST["user"], db_admin_password => sha1($_POST["passwd"]) ) );

      if(!empty($record) ){

        // save login data
        $_SESSION['privilege_user'] = $record[db_admin_privilege];
        $_SESSION['name'] = $record[db_admin_firstname];
        $_SESSION['username'] = $record[db_admin_username];

        // save cookie authencation for 1 hour 
        if( isset($_POST["login_remember"])) {
          setcookie('privilege_user', $record[db_admin_privilege], time() + 3600,"/"); 
          setcookie('name', $record[db_admin_firstname], time() + 3600,"/"); 
          setcookie('username', $record[db_admin_username], time() + 3600,"/"); 
        }
        return true;

      } else {
        return false;

      }

    }

  }

  function restore_mail(){

    $email_destination = $_POST["restore_email"];

    //
    // admin::simple_fetch( db_admin_email, $email_destination);

    // link to form to restore password
    $data = array("link" => BASE_URL."index.php?action=restoreForm&email=$email_destination");

    // content html
    $html_message = file_get_contents("views/account/restore_password_email.php"); 

    foreach ($data as $key => $value) {
      $html_message = str_replace("<?=\$$key?>", $value, $html_message);
    }

    // Sending mail
    if (send_html_mail( $email_destination, $html_message)) 
      echo "Sending mail successfully <br>";
    
    else 
      echo "Sending mail failed";

    //
    
    echo "Click vao link ve <a href='index.php'> login </a> \n";
  }

  function restoreForm(){
    //
    $email=$_GET["email"];

    //
    require_once('views/account/restore_form.php');
  }

  function restorePassword(){
    
    //
    $stm = admin::update( array(db_admin_email => $_POST["email"]),
      array(db_admin_password => sha1($_POST["passwd"]) ) );
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }

    //
    echo "password has changed <br>";
    echo "Click vao link ve <a href='index.php'> login </a> \n";
  }

  // Register new account to DB, based on request of register form
  // return echo viec dang ky failed hoac succes de user biet va nut back to login page
  function register() {
    $message = "";
    // Insert new account
    $arr=array(); 
    $arr[db_admin_username] = $_POST['user'];
    $arr[db_admin_password] = sha1($_POST['passwd']);
    $arr[db_admin_email] = $_POST['email'];
    $arr[db_admin_privilege] = privilege::no_actived;
    $stm = admin::insert($arr);
    if($stm->errorInfo()[2]) {
      echo "<b style='color:red'>SQL Error: ";print_r($stm->errorInfo()[2]);echo "</b >"; echo "<br>";
      exit();
    }
    // active account
    
    $email_destination = $_POST['email'];

    // link to form active email
    $data = array("link" => BASE_URL."index.php?action=doActive&email=$email_destination");
    // content html
    $html_message = file_get_contents("views/account/active_email.php"); // get content

    foreach ($data as $key => $value) {
      $html_message = str_replace("<?=\$$key?>", $value, $html_message);
    }

    //
    if (send_html_mail($email_destination, $html_message)) 
      echo "An active mail has been sent to your mail";
    else 
      echo "An active mail has no been sent";

    echo "Click vao link ve <a href='index.php'> login </a> \n";
  }

  // Verify  ajax request
  public function verifyRegisterAccount(){
    $result = 0;
    $message = "";
    // Verify username registered already
    if( !empty( admin::simple_fetch( db_admin_username, $_GET['user'])) ) $result+=1;

    // Verify email registered already
    if( !empty( admin::simple_fetch( db_admin_email, $_GET['email'])) ) $result+=2;

    switch ($result) {
     case 1:
         $message = "username registered already";
         break;
     case 2:
         $message = "mail registered already";
         break;
     case 3:
         $message = "username,mail registered already";
         break;      
    }

    echo $message;
  }

  public function doActive(){
    admin::update(array(db_admin_email => $_GET["email"]),
                  array(db_admin_privilege => privilege::demonstration) );

    require_once('views/account/activeSuccess.php');
  }

}