
<?php
// Entity Class == View manufacturer pages
class CustomerController extends BaseController
{
  function __construct() {

    $this->folder = "customer";
    $this->setScript("customer");    
    $this->setCss("customer");  
  }


  //
  static public function exportCustomerInfo2Excel(){
      $data = Customer::getAll();
      array_walk($data,function(&$row){

        $row["subscriber"]  = Subscriber::find($row[db_customer_email]) 
                              ? 'Chưa theo dõi': 'Đã theo dõi';
        //
        $orderHistoryOfCustomer = Order::summaryByCustomer($row[db_customer_id]);
        $row["numOrder"]    =  count($orderHistoryOfCustomer);
        $row["spendMoney"]  = array_sum( 
                              array_column($orderHistoryOfCustomer, db_order_totalPrice) );
          
      });
      
      $filename = "customers-".getTimeStamp('Y-m-d-H-i-s'). ".xls";     
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
      ExportFile($data);
      exit();
  }

  /**
   * Main page of reviews management application
   * @return [type] [description]
   */
  function show(){
    
    $data = Customer::getAll();
    array_walk($data,function(&$row){

      $row["subscriber"]  = Subscriber::find($row[db_customer_email]) 
                            ? 'Chưa theo dõi': 'Đã theo dõi';
      //
      $orderHistoryOfCustomer = Order::summaryByCustomer($row[db_customer_id]);
      $row["numOrder"]    =  count($orderHistoryOfCustomer);
      $row["spendMoney"]  = array_sum( 
                            array_column($orderHistoryOfCustomer, db_order_totalPrice) );
        
    });



    $this->view_file = "list_customer";
    $this->render(
      array("data" => $data)
    );
  }
}