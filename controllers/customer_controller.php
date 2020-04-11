<?php
/**
 * summary
 */
class customer_controller extends controller
{
    /**
     * summary
     */
    
    /**
     * [__construct description]
     * @param [type] $action [description]
     */
    public function __construct($action)
    {
        switch ($action) {
          case "logout":
            $this->action_implement = "logout";
            break;
          case "addCart":
            $this->action_implement = "addCart";
            break;
          case "addWishlist":
            $this->action_implement = "addWishlist";
            break;  
          case "removeCart":
            $this->action_implement = "removeCart";
            break;
        	case "verify": 
        		$this->action_implement = "authenticate";
        		break;
          case "deleteWishlist": 
            $this->action_implement = "deleteWishlist";
            break;  
          case "manager_account": 
            $this->action_implement = "managerAccount";
            break;  
          case "subscribe": 
            $this->action_implement = "subscribe";
            break;  

          case "activeSubscriber": 
            $this->action_implement = "activeSubscriber";
            break;  

          case "google_login": 
            $this->action_implement = "google_login";
            break;  

          case "updateProfile": 
            $this->action_implement = "updateProfile";
            break;   

        	default:
        		$message = " do not support action $action";
				    throw new RouteException($message);
        		break;
        }
    }

    protected function updateProfile(){
      $stm = Customer::updateProfile();
      if( $stm->errorInfo()[2] ) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }

      redirect("index.php");
    }

    // tao data session de phuc vu nguoi dung trong phien.
    private function assignCustomerSession($customer_id,$customer_name){
        $_SESSION['customer']['id']       = $customer_id;
        $_SESSION['customer']['name']     = $customer_name;
    }

    protected function google_login(){
      // Tai credential OAuthen app
      // fix loi trien khai tren server
      // require_once COMPONENT_PATH.'google-api-php-client-2.4.1_PHP54\vendor\autoload.php';
      require_once COMPONENT_PATH.'google-api-php-client-2.4.1_PHP54/vendor/autoload.php';

      $client_id = '471082148699-oeb801shajkbmq1aoiqj8d58n4hv1lql.apps.googleusercontent.com'; 
      $client_secret = 'DYoyrMRvz8iCazBxP8vXVPK7';
      $redirect_uri = USER_URL.'index.php?controller=customer_controller&action=google_login';

      $client = new Google_Client();
      $client->setClientId($client_id);
      $client->setClientSecret($client_secret);
      $client->setRedirectUri($redirect_uri);
      $client->addScope("email");
      $client->addScope("profile");

      $service = new Google_Service_Oauth2($client);

      // google xác thực thành công, authen code được trả về
      if ( isset($_GET['code']) ) { 
        ob_start();
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();

        $user = $service->userinfo->get(); //get user info
        ob_get_clean();  

        // Tài khoản gmail dùng để xác thực đã đăng kí với app
        $customer = Customer::findByEmail($user->email,$user->name);
        if( $customer ){
            self::assignCustomerSession($customer[db_customer_id],
                $customer[db_customer_lastName]);
            redirect("index.php");
        }

        // Đăng kí tài khoản mới
        $stm = Customer::register($user->email,$user->name);
        if( $stm->errorInfo()[2] ) {
          $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
          throw new MySQLQueryException($message);
        }

        self::assignCustomerSession(DB::getInstance()->lastInsertId(),
                $user->name);

        redirect("index.php");  
      }

      // customer dang nhap tu truoc
      if( isset($_SESSION['access_token']) && $_SESSION['access_token']){
        redirect("index.php");
      } 
      
      // Chuyen huong lien ket den OAuthen google
      redirect( $client->createAuthUrl() );
    }

    /**
     * [ main_home action implement ]
     * @return [type] [description]
     */
    protected function authenticate(){
        //
        if( isset($_SESSION['customer']) )
          redirect("index.php");

        //
        if( isset($_POST["email"]) && isset($_POST["password"]) ) {
          $customer = Customer::authenticate();
          
          if( $customer ) {
            self::assignCustomerSession($customer[db_customer_id],
                $customer[db_customer_lastName]);

            redirect("index.php");  
            return;
          }
          echo "email hoặc mật khẩu không hợp lệ";
          echo "Nhấn link để trở về <a href='index.php'>trang chủ </a>";
          return;  
        }
    }

    /**
     * [addCart add product to cart 
     *   no return if no action be executing, quantity exceeds limit.
     *   product in case sucess
     *   exception if failed on SQL query
     * ]
     */
    protected function addCart(){
      //
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      //
      $id = $_GET["id"];
      //
      $stm = Cart::add($id);
      
      if ( !isset($stm) ) return; // not executing sql 

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
        return;
      } 

      //
      // return for ajax approach 
      // echo "$product";
      $product = Product::find($id);
      $img = $product[db_product_image];
      $product[db_product_image] = $img? PRODUCT_IMAGE_URL.$img : 
                      PRODUCT_IMAGE_URL."image_not_found.png";
      //                
      $response = [
        "id"   => $product[db_product_id],
        "name" => $product[db_product_name],
        "img"  => $product[db_product_image],
        "price"  => $product[db_product_price],  
      ];
      // echo $product;
      echo json_encode($response);
      return;
      // reload page
      // redirect("index.php");

    }

    protected function removeCart(){ 
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      $product = $_GET["id"];
      $stm = Cart::remove($product);

      if ( !isset($stm) ) return; // not executing sql

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }

      //
      echo $product;
    }

    /**
     * [addWishlist description]
     *
     * return: 
     *   no return if no action be executing, product in wishlist before.
     *   product in case sucess
     *   exception if failed on SQL query
     */
    protected function addWishlist(){
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }

      $id = $_GET["id"];
      
      $stm = Customer::addWishlist($id);

      if ( !isset($stm) ) return; // not executing sql as product was in wishlist before

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      } 

      //
      // return for ajax approach 
      // echo "$product";
      $product = Product::find($id);
      $img = $product[db_product_image];
      $product[db_product_image] = $img? PRODUCT_IMAGE_URL.$img : 
                      PRODUCT_IMAGE_URL."image_not_found.png";
      $response = [
        "id"   => $product[db_product_id],
        "name" => $product[db_product_name],
        "img"  => $product[db_product_image]   
      ];
      // echo $product;
      echo json_encode($response);

      // reload page
      // redirect("index.php");
    }

    protected function deleteWishlist(){
      if( !isset($_SESSION['customer']) ) {
        echo "Customer need to login"; // message alert for user  
        return;
      }
      
      $product = $_GET["id"];

      $stm = Customer::removeWishlist($product);

      if ( !isset($stm) ) return;

      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }
      
      //
      // return for ajax approach 
      echo "$product";
      // reload page
      // redirect("index.php");
    }

    protected function logout(){
      unset($_SESSION['customer']);
      unset($_SESSION['access_token']);

      //
      redirect("index.php");
    }

    protected function managerAccount(){
      //
      $account = Customer::find1record(
        array( db_customer_id => $_SESSION['customer']['id'])
      );
      
      //
      $dataOnView = [
            "lastName" => $account[db_customer_lastName],
            "firstName" => $account[db_customer_firstName],
            "telephone" => $account[db_customer_telephone] 
        ];
      
      //
      $view = CUSTOMER_PATH.'infomation.php';

      $this->render($view,$dataOnView);    
    }

    protected function subscribe(){
      //
      $email_destination = $_GET["email"];

      //
      $sql = "INSERT INTO `subscriber` (`email`) VALUES (?)";
      $stm  = DB::getInstance()->prepare($sql);
      $stm->execute(
        array($email_destination)
      );

      //
      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }

      //
      $redirect_link = USER_URL."index.php?controller=customer_controller&action=activeSubscriber&id="
                      .DB::getInstance()->lastInsertId();
      // content html
      $html_message = "Nhấn vào <a href='$redirect_link'> link </a> để xác nhận đăng kí";

      // Sending mail
      if ( !send_html_mail( $email_destination, $html_message) ) 
        echo "Sending mail failed";

      //
      echo "1";

      //
    }

    protected function activeSubscriber(){
      //
      $id = $_GET["id"];
      $sql = "UPDATE `subscriber` SET `status` = '1' WHERE `subscriber`.`id` = ".$id;
      $stm  = DB::getInstance()->prepare($sql);
      $stm->execute();
      if($stm->errorInfo()[2]) {
        $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
        throw new MySQLQueryException($message);
      }

      //
      echo "kích hoạt thành công";
      echo "Nhấn link để trở về <a href='index.php'>trang chủ </a>";
    }

}