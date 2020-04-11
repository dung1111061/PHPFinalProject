
<?php
/**

 */
class OrderController extends BaseController
{

  // Define
  function __construct() {
    $this->folder = "order";
  }

//===========================================
  function display_details_order(){
    $this->view_file = "order";
    $this->setScript("order");
    $data = array();
    $data["status"] = OrderStatus::getStatus( $_GET["id"] );
    $data["id"] = $_GET["id"];

    $this->render($data);
  }

  //===========================================
  function display_new_orders(){
    $data = order::getNewOrder();
        
    //
    foreach ($data as &$order) {
        $order["products"]      = OrderProduct::findProduct( $order[db_order_id] );
        $order[db_order_status] = OrderStatus::getStatus( $order[db_order_id] );
        $order['status']        = self::descripStatus($order[db_order_status]);
        $order[db_order_customerName]  = Customer::find1record(
          array( db_customer_id => $order[db_order_customer] )
        )[db_customer_lastName];
    }
    

    $this->view_file = "list_new_order";
    $this->setScript("order");
    $this->render($data);
  }

  //===========================================
  function display_accomplished_orders(){
    $data = order::getAccomplishedOrder();
        
    //
    foreach ($data as &$order) {
        $order["products"]      = OrderProduct::findProduct( $order[db_order_id] );
        $order[db_order_status] = 5;
        $order['status'] = self::descripStatus($order[db_order_status]);
        $order[db_order_customerName]  = Customer::find1record(
          array( db_customer_id => $order[db_order_customer] )
        )[db_customer_lastName];
    }

    
    $this->view_file = "list_old_order";
    $this->setScript("order");
    $this->render($data);
  }
 
  function shipping_order(){
    //
    $stm  = OrderStatus::updateOldStatus( $_GET["id"] );
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }
    
    //
    $data = [
        db_orderStatus_order  => $_GET["id"],
        db_orderStatus_status => ORDER_STATUS::shipping
    ];
    $stm = OrderStatus::createNew($data);
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }

    //
    echo "2"; 
  }

  function pause_order(){

  }

  function cancel_order(){

  }

  function accomplish_order(){
    //
    $stm  = OrderStatus::updateOldStatus( $_GET["id"] );
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }
    
    //
    $data = [
        db_orderStatus_order  => $_GET["id"],
        db_orderStatus_status => ORDER_STATUS::done
    ];
    $stm = OrderStatus::createNew($data);
    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }

    //
    echo "5";

  }

#==================================
  function descripStatus($codeStatus){
    $status = "chưa có mô tả";
    switch ($codeStatus) {
          case ORDER_STATUS::processing:
            $status = "đang xử lí";
            break;
          case ORDER_STATUS::shipping:
            $status = "đang giao hàng";
            break;
          case ORDER_STATUS::paused:
            $status = "tạm hoãn";
            break;
          case ORDER_STATUS::cancel:
            $status = "bị hủy";
            break;
          case ORDER_STATUS::done:
            $status = "hoàn thành";
            break;  
        }

        return $status;
  }

}