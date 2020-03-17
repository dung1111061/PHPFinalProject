<?php



// get data from http request and controller
echo "<pre>";
$id2 = 36;
// $related_products = relatedProduct::get($id2);
// print_r($related_products);
// print_r(array_column($related_products, db_relatedproduct_related_id));

if ( empty($_GET["related"]) ){
	echo "selection not choosen <br>";
} else {
	echo "selection choosen <br>";
	$related_product = $_GET["related"];

	// add related_product to database
	// relatedProduct::insert($id2,$related_product);

	// edit
	relatedProduct::edit($id2,$related_product);
}
?>

<form action="" onsubmit="return validate_form()">
	<div id="related-product-selection" class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-select-4">test</label>

			<div class="col-xs-4 col-sm-3"> 	
				<select multiple="" class="chosen-select form-control" id="form-field-select-4" data-placeholder="Choose a State..." style="width: 200px" name="related[]">
				  	<?php
				  		$m_data = product::getAll();
				  		$related_products = relatedProduct::get($id2);
				  		foreach ($m_data as $key => $row) {
				  			$name = $row[db_product_name];
				  			$id = $row[db_product_id];
				  			$selected = ( in_array($id,array_column($related_products, db_relatedproduct_related_id)) ) ? 'selected' : NULL; 
				  	?>	
				  		<option value="<?=$id?>" <?=$selected?>  > <?=$name?> </option>
					<?php
					}
					?>
				</select>
			</div>
	</div>

	<input type="submit">
</form>
<a href="<?="test-product.php";?>">back to testing page</a>
<!-- back to testing page -->


<script>
	function validate_form(){
		return validate_related_product_selection();
	}

	function validate_related_product_selection(){
		var values = $('#form-field-select-4').val();
		if (values.length > parseInt(<?=  relatedProduct::$maximum_number?>)){
			alert("maximum related product allowed is <?=  relatedProduct::$maximum_number?>");
			return false;
		} 
		return true;
	}
	
</script>