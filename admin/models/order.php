<?php
// Product Table
// Define method to query product table
class Order extends Table 
{
	protected static $tablename = "order_details";
	protected static $timestamp = TRUE;



	static function statisticByRevenue(){
		$statistics=[
			'computer' => 0,
			'phone' => 0,
			'accessories' => 0,
			'camera' => 0
		];

		$data = self::getAccomplishedOrder();
		foreach ($data as $order) {
			$product_list = OrderProduct::findProduct($order[db_order_id]);
			foreach ($product_list as $row) {
				//
				$product  = Product::getByName($row['name']);
				$price    = $product[db_product_price];
				$category = $product[db_product_category]; 
				$quantity = $row['quantity'];

				if( $category == 2 || in_array($category,Category::getChildCategories(2)) )
					$statistics['phone'] += $price*$quantity;

				if( $category == 4 || in_array( $category,Category::getChildCategories(4) ) )
					$statistics['accessories'] += $price*$quantity;

				if( $category == 8 || in_array( $category,Category::getChildCategories(8) ) )
					$statistics['computer'] += $price*$quantity;

				if( $category == 12 || in_array( $category,Category::getChildCategories(12) ) )
					$statistics['camera'] += $price*$quantity;

				
				// switch ($category) {
				// case in_array( $category,Category::getChildCategories(2) ):
				// 	$statistics['phone'] += $price*$quantity;
				// 	break;
				// case in_array( $category,Category::getChildCategories(4) ):
				// 	$statistics['accessories'] += $price*$quantity;
				// 	break;
				// case in_array( $category,Category::getChildCategories(8) ):
				// 	$statistics['computer'] += $price*$quantity;
				// 	break;
				// case in_array(  $category,Category::getChildCategories(12) ):
				// 	$statistics['camera'] += $price*$quantity;
				// 	break;
				// }
			}
			
		}

		return $statistics;
	}

	static function summaryByCustomer($customer){
		$condition = [
			db_order_customer => $customer
		];

		return self::findTableRecord($condition);
	}

	static function createNew($data){
		return self::insert($data);
	}
	static public function getNewOrder(){
		//
		$orders = self::getAll();
		
		// filter new
		$newOrders = array_filter($orders, function ($order){		  	
		  return ( ! OrderStatus::checkDone( $order[db_order_id] ) );
		});

		//
		return $newOrders;
	}

	static public function getAccomplishedOrder(){
		//
		$orders = self::getAll();
		
		// filter new
		$oldOrders = array_filter($orders, function ($order){		  	
		  return ( OrderStatus::checkDone( $order[db_order_id] ) );
		});

		//
		return $oldOrders;
	}
  
}