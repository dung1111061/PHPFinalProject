<?php
/*
	View module for display product details widget to edit
	Note: Reused view module for dislay widget used to insert new product, keep in mind if no pass checked product meaning that product record variable is null
 */

// Controler to edit and insert view
$language=language::english; 
$form_action = "product.php?action=insert"; // insert page
if ($action === "display_edit") { // edit product
	$form_action = "product.php?action=edit&id=".$id;
}

$wg_product_title[$language] = "Insert Product";
if($action === "display_edit"){
	$wg_product_title[$language] = "Edit Product";
}

?>

<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 

			<!--  -->
			<?php include_once "views/layouts/breadcrump.php"; ?>

		</div>
		
	</div>
		
</div>

<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"><?= $wg_product_title[$language]?></h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#general">Thông Tin Chung</a>
					</li>

					<li>
						<a data-toggle="tab" href="#specification"> Chi Tiết Cấu Hình </a>
					</li>

					<li>
						<a data-toggle="tab" href="#other"> Khác </a>
					</li>
				</ul>
			</div>
		</div>

<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" onsubmit="return validate_form()">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">

					<!--  Tab General -->
					<div id="general" class="tab-pane in active">
						<!-- Field of general -->
						
							<div class="form-group">
								
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?=wg_product_name[0]?> </label>

								<div class="col-sm-4">
									<input type="text" id="form-field-1" placeholder="<?= wg_product_name[0]?>" class="col-xs-10 col-sm-12" name="name" required value="<?= $p_record[db_product_name]?>"/>
								</div>

							</div>

								<div class="hr hr-24"></div>
								
							<div class="form-group">	
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?=wg_product_model[0]?> </label>

								<div class="col-sm-4">
									<input type="text"  placeholder="<?= wg_product_model[0]?>" class="col-xs-10 col-sm-12" name="model" value="<?= $p_record[db_product_model]?>"/>
								</div>
							</div>

								<div class="hr hr-24"></div>

								<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-manufacturer"><?= wg_product_manufacturer[0]?></label>

										<div class="col-xs-12 col-sm-6">
											<select class="chosen-select form-control" id="select-manufacturer" data-placeholder="Choose  manufacturer" name="manufacturer">
												<option value="">  </option>
										  	<?php
										  		// import data for manufacturer dropdown list plugin
										  		foreach ($m_data as $key => $row) {
										  			$name = $row[db_manufacturer_name];
										  			$m_id = $row[db_manufacturer_id];
										  			$selected = $m_id === $p_record[db_product_manufacturer] ? 'selected' : NULL;
										  	?>	

										  		<option value="<?= $m_id ?>" <?= $selected ?> > <?= $name ?></option>
											<?php
											}
											?>

											</select>

										</div>
								</div>

						<div class="hr hr-24"></div>
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-mask-4">
								Price
								
							</label>

							<div class="col-xs-12 col-sm-6">
								<input class="input-medium input-mask-money" type="text" id="price" name="price" value="<?=$p_record[db_product_price]?>"/>
							</div>

						</div>
						<!--  -->
<div class="hr hr-24"></div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="discount">
		Discount
		
	</label>

	<div class="col-xs-12 col-sm-6">
		<input type="text" id="discount" name="discount" value="<?=$p_record[db_product_discount]?>"/>
	</div>



</div>
						<!--  -->
<div class="hr hr-24"></div>

<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-category"><?= wg_product_category?></label>

		<div class="col-xs-4 col-sm-3">
			<select class="chosen-select form-control "  id="select-category" data-placeholder="Choose a category..." name="category" >
				<option value="">  </option>
		  	<?php
		  		// import data for category dropdown list plugin
		  		foreach ($c_data as $key => $row) {
		  			$name = $row[db_category_name];
		  			$c_id = $row[db_category_id];
		  			$selected = $c_id === $p_record[db_product_category] ? 'selected' : NULL;

		  	?>	

		  		<option value="<?= $c_id ?>" <?= $selected ?> > <?= $name ?></option>
			<?php
			}
			?>

			</select>

		</div>
</div>
<!--  -->
<div class="hr hr-24"></div>
<div id="related-product-selection" class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-related"><?= wg_product_related?></label>

		<div class="col-xs-12 col-sm-4"> 	
			<select multiple="" class="chosen-select form-control" id="select-related" data-placeholder="Choose product..." name="related[]">
				<?php
				// import data for related product dropdown list plugin
			  		foreach ($p_data as $key => $row) {
			  			$name = $row[db_product_name];
			  			$p_id = $row[db_product_id];
			  			$selected = ( in_array($p_id,array_column($related_products, db_relatedproduct_related_id)) ) ? 'selected' : NULL; 

			  		?>	
			  		<option value="<?=$p_id?>" <?=$selected?>  > <?=$name?> </option>
				<?php
				}
				?>
			</select>
		</div>
</div>
					</div>
<!--  Tab General -->

<!--  Tab specifications -->
<div id="specification" class="tab-pane">
	
	<div class="form-group">	
		<label class="col-sm-3 control-label no-padding-right"> Khối Lượng </label>

		<div class="col-sm-4">
			<input type="number" class="col-xs-10 col-sm-12" name="weight" value="<?=$p_record[db_product_weight]?>"/>
		</div>
	</div>
<!--  -->
	<div class="hr hr-24"></div>
	<div class="form-group">	
		<label class="col-sm-3 control-label no-padding-right"> Kích Thước </label>
		
		<div class="col-sm-4">
			<input type="text" class="col-xs-10 col-sm-12 form-control input-mask-size" name="size" value="$p_record['size']" />
		</div>
	</div>
<!--  -->


</div>
<!--  Tab specifications -->

<!--  Tab Infomation -->
					<div id="other" class="tab-pane">
<!--  -->
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="quantity">
		Quantity
		
	</label>

	<div class="col-xs-12 col-sm-6">
		<input type="text" id="quantity" name="quantity" value="<?=$p_record[db_product_quantity]?>"/>
	</div>
</div>
<!--  -->
<div class="hr hr-24"></div>

<div class="form-group">
	<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1"><?= wg_product_available_date[$language]?></label>

	<div class="row">
		<div class="col-sm-8">
			<div class="input-group col-sm-5">
				<input class="form-control date-picker " id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="available_date" value="<?=$p_record[db_product_available_date] ?>" />
				<span class="input-group-addon">
					<i class="fa fa-calendar bigger-110"></i>
				</span>
			</div>
		</div>
	</div>
</div>
<!--  -->
<div class="hr hr-24"></div>
<div class="form-group">
	<label class="col-sm-3 no-padding-right control-label"  for="description"><?= wg_product_description[$language]?></label>
	
	<div class="row">
		<div class="col-sm-8">
		<script src="../system/ckeditor/ckeditor.js"></script>	
			<textarea id="description" name="description" class="form-control limited" minlength="10" name="description">
				<?= $p_record[db_product_description]?>	
			</textarea>
		<script>CKEDITOR.replace('description');</script>	
	</div>
</div>
</div>
									
<?php
// control view of submit button
	$save_button_display = "inline";
	$edit_button_display = "none";
if ($action === "display_edit") {
	$save_button_display = "none";
	$edit_button_display = "inline-block";
}


?>
<!--  -->
<div class="hr hr-24" ></div>
<div class="form-group"  >
	<label class="col-sm-3 no-padding-right control-label"  for="image-product"><?= wg_product_image[$language]?></label>

	<div class="col-sm-5" >
		<img id="image-product" style="width:100px; max-height: 150px;" src="<?=$p_record["src"]?>" />
		<input  multiple="" type="file" id="image-input" name="img" />
	</div>
</div>	
<!--  -->
<div class="hr hr-24"></div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3">Hot Deal</label>

	<div class="controls col-xs-12 col-sm-9">
		<div class="row">
			<div class="col-xs-3">
				<label>
					<input name="hot_deal" class="ace ace-switch ace-switch-2" type="checkbox" <?= $p_record[db_product_hot_deal] ? "checked":""  ?>/>
					<span class="lbl"></span>
				</label>
			</div>
		</div>
	</div>
</div>

<!--  -->
<div class="hr hr-24"></div>
<div class="form-group">
	<label class="control-label col-xs-12 col-sm-3">Top Selling</label>

	<div class="controls col-xs-12 col-sm-9">
		<div class="row">
			<div class="col-xs-3">
				<label>
					<input name="top_selling" class="ace ace-switch ace-switch-2" type="checkbox" <?= $p_record[db_product_top_selling] ? "checked":""  ?>/>
					<span class="lbl"></span>
				</label>
			</div>
		</div>
	</div>
</div>
<!--  -->
<div class="hr hr-24"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3">New Product</label>

		<div class="controls col-xs-12 col-sm-9">
			<div class="row">
				<div class="col-xs-3">
					<label>
						<input name="new_product" class="ace ace-switch ace-switch-2" type="checkbox" <?= $p_record[db_product_new] ? "checked":""?>/>
						<span class="lbl"></span>
					</label>
				</div>
			</div>
		</div>
	</div>
					</div>
<!--  Tab Infomation -->

					</div>
				</div>
			</div>

		</form>
		</div>
</div>
<!--  -->
<div class="col-xs-2" style="text-align: right">
	<button id="save-button" class="btn btn-app btn-grey btn-xs radius-4 " data-toggle="tooltip" title="<?= SAVE_TOOLTIP_MESSAGE?>" style="display: <?=$save_button_display?>" >
		<i class="ace-icon fa fa-floppy-o bigger-160"></i>
		Save
	</button>

	<div id = "edit-button" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="<?= EDIT_TOOLTIP_MESSAGE?>" style="display: <?=$edit_button_display?>"> 
		<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
	</div>
	
</div>