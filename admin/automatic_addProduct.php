<?php
include_once "bootstraping.php";

$data = [
    'model' => '',
    'manufacturer_id' => '5',
    'category_id' => '4',
    'date_available' => '0000-00-00',
    'description' => 
'demo upload image in ckeditor',
    'quantity' => '1',
    'price' => '999.999',
    'top_selling_flag' => '1',
    'new_flag' => '1',
    'hot_deal' => '0',
    'percentage_discount' => '10',
    'weight' => '0.00',
    'length' => '0.00',
    'height' => '0.00',
    'width' => '0.00',
];
for ($i=0;$i<10;$i++){
	$data['product_name'] = 'Tai nghe '.($i+1);
	Product::insert($data);
}

