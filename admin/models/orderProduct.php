<?php
// Product Table
// Define method to query product table
class OrderProduct extends Table 
{
  	protected static $tablename = "order_product";


	static public function createNew($data){
		return self::insert($data);
	}

#=====================  
	/**
	 * [findProduct get all product in order]
	 * @param  [type] $order [description]
	 * @return [type]        [list of product]
	 */
	static public function findProduct($order){
		//
		$productList = array();

		//
		$condition = [
			db_orderProduct_order => $order,
		];

		//
		$data = self::findTableRecord($condition);
		
		foreach ($data as $record) {
			//
			$product = [
				"name" => "",
				"quantity" => ""
			];
			
			$product["name"] 	= Product::find($record[db_orderProduct_product])[db_product_name];
			$product["quantity"] = $record[db_orderProduct_quantity];
			//
			$productList[] = $product;
		}
		return $productList;
	}

}