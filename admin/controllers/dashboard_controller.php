<?php

class DashboardController extends BaseController
{
  function __construct() {

    $this->folder = "dashboard";
    $this->setScript("dashboard");    
  }

  function writeJsonRevenuestatistics(){
    $statistics = Order::statisticByRevenue();

    //
    $fp = fopen('json/revenue_statistics.json', 'w');
    fwrite($fp, json_encode($statistics));
    fclose($fp);
  }

  function show() {

    //
    $this->writeJsonRevenuestatistics();

    //
    $review_number = count( Review::getAll() );
    $customner_number = count( Customer::getAll() );

    $orders = Order::getAccomplishedOrder();
    $order_number = count( $orders );
    $earning_money = array_sum( array_column($orders, db_order_totalPrice) );
    $subscriber_number = count( Subscriber::getAll() );
    
    //
    $data = [
      "review_number"=>$review_number,
      "customner_number"=>$customner_number,
      'order_number' => $order_number,
      'subscriber_number' => $subscriber_number,
      'earning_money' => $earning_money
    ];
    //
  	$this->view_file = "dashboard";
    $this->render( $data );     
  }
}