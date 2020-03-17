<?php
/*
	View module for display product details widget to edit
	Note: Reused view module for dislay widget used to insert new product, keep in mind if no pass checked product meaning that product record variable is null
 */

$language=language::english; 

$form_action = "product.php?action=insert"; // insert page
if ($route === "edit") { // edit product
	$form_action = "product.php?action=edit&id=".$id;
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
<?php
$wg_product_title[$language] = "Insert Product";
if($route === "edit"){
	$wg_product_title[$language] = "Edit Product";
}
?>
<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"><?= $wg_product_title[$language]?></h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#general"><?= wg_product_tag_general[$language]?></a>
					</li>

					<li>
						<a data-toggle="tab" href="#profile"><?= wg_product_tag_specification[$language]?></a>
					</li>

					<li>
						<a data-toggle="tab" href="#info"><?= wg_product_tag_info[$language]?></a>
					</li>
				</ul>
			</div>
		</div>

		<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" onsubmit="return validate_form()">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">
<div id="general" class="tab-pane in active">
	<!-- Field of general -->
			<div class="form-group">
					<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-select-manufacturer"><?= wg_product_manufacturer[0]?></label>

					<div class="col-xs-4 col-sm-3" id="form-field-select-manufacturer">
						<select class="chosen-select form-control"  data-placeholder="" name="manufacturer">
							<option value="">  </option>
					  	<?php
					  		$m_data = manufacturer::getAll();
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
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-select-category"><?= wg_product_category?></label>

		<div class="col-xs-4 col-sm-3" id="form-field-select-category">
			<select class="chosen-select form-control"   data-placeholder="Choose a category..." name="category" >
				<option value="">  </option>


		  		<option value="1">Test 1</option>
		  		<option value="2">Test 2</option>
		  		<option value="3">Test 3</option>


			</select>

		</div>
</div>		
</div>
						

<div id="profile" class="tab-pane">
	<!-- Technical Specification -->
	
<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-select-category"><?= wg_product_category?></label>

		<div class="col-xs-4 col-sm-3" id="form-field-select-category">
			<select class="chosen-select form-control"   data-placeholder="Choose a category..." name="category" >
				<option value="">  </option>


		  		<option value="1">Test 1</option>
		  		<option value="2">Test 2</option>
		  		<option value="3">Test 3</option>


			</select>

		</div>
</div>	





</div>

<div id="info" class="tab-pane">
	
</div>

					</div>
				</div>
			</div>

		</form>
		</div>
</div>
<?php
		$save_display = "inline";
		$edit_display = "none";
	if ($route ==='edit') {
		$save_display = "none";
		$edit_display = "inline-block";
	}
?>

<div class="col-xs-2" style="text-align: right">
	<button id="save-button" class="btn btn-app btn-grey btn-xs radius-4 " data-toggle="tooltip" title="<?= SAVE_TOOLTIP_MESSAGE?>" style="display: <?=$save_display?>" >
		<i class="ace-icon fa fa-floppy-o bigger-160"></i>
		Save
	</button>

	<div id = "edit-button" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="<?= EDIT_TOOLTIP_MESSAGE?>" style="display: <?=$edit_display?>"> 
		<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
	</div>
	
</div>