<?php 
// Imported Data list
// route, m_data, p_data

$language=language::english; 

$form_action = "product.php?route=insert&action=insert"; // insert page
if ($route === "edit") { // edit product
	$form_action = "product.php?route=edit&action=edit&origin_name=".$p_record[db_product_name];
}

?>

<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 

			<!--  -->
			<?= $top_menu ?>

		</div>
		<div class="ace-settings-container" id="ace-settings-container"> 
			
			<?= $setting ?> 
		</div><!-- /.ace-settings-container -->
	</div>
		<div class="col-xs-4" style="text-align: right">
			<button class="btn btn-app btn-grey btn-xs radius-4" id="save-button" data-toggle="tooltip" title="<?= SAVE_TOOLTIP_MESSAGE?>">
				<i class="ace-icon fa fa-floppy-o bigger-160"></i>
				Save
			</button>
				<?php
					if ($route ==='edit') {
				?>
				<div id = "id-disable-check" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="<?= EDIT_TOOLTIP_MESSAGE?>"> 
					<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
				</div>
				<?php
					}
				?>		
		</div>
</div>

<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"><?= wg_product_title[$language]?></h5>

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

		<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">
					<div id="general" class="tab-pane in active">
						<!-- Field of general -->
						
							<div class="form-group">
								
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?=wg_product_name[0]?> </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="<?= wg_product_name[0]?>" class="col-xs-10 col-sm-5" name="name" required value="<?= $p_record[db_product_name]?>"/>
								</div>

							</div>

								<div class="hr hr-24"></div>
								
							<div class="form-group">	
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?=wg_product_model[0]?> </label>

								<div class="col-sm-9">
									<input type="text"  placeholder="<?= wg_product_model[0]?>" class="col-xs-10 col-sm-5" name="model" value="<?= $p_record[db_product_model]?>"/>
								</div>
							</div>

								<div class="hr hr-24"></div>

								<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="form-field-select-3"><?= wg_product_manufacturer[0]?></label>

										<div class="col-xs-4 col-sm-3">
											<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." name="manufacturer">
												<option value="">  </option>
										  	<?php
										  		foreach ($m_data as $key => $row) {
										  			$name = $row["name"];
										  			$id = $row["manufacturer_id"];
										  			$selected = $row["manufacturer_id"] === $p_record[db_product_manufacturer_id] ? 'selected' : NULL;
										  	?>	

										  		<option value="<?= $id ?>" <?= $selected ?> name="checkbox" > <?= $name ?></option>
											<?php
											}
											?>

											</select>

										</div>
								</div>
					</div>
						

					<div id="profile" class="tab-pane">
						<!-- Technical Specification -->
						
					</div>

					<div id="info" class="tab-pane">
						<!-- Infomation -->
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

					<div class="hr hr-24"></div>
					<div class="form-group">
						<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1"><?= wg_product_description[$language]?></label>
						
						<div class="row">
							<div class="col-sm-8">
							<script src="../ckeditor/ckeditor.js"></script>	
								<textarea id="description" name="description" class="form-control limited" minlength="10" name="description">
									<?php 								 
									if ($route === "edit") {
										echo $p_record[db_product_description];
									} else {
										echo 'pseudo description';
									}     
									?>	
								</textarea>
							<script>CKEDITOR.replace('description');</script>	
						</div>
					</div>
						</div>
					<div class="hr hr-24" ></div>
<?php
if ($route === "edit") {
	$upload_image = "none"
?>
	<img style="width:100px; max-height: 150px;" src="<?=PRODUCT_IMAGE_PATH."/".$p_record[db_product_image]?>" alt="<?=$p_record[db_product_image] ?>">
	<button id="upload_new_image"> Upload new image</button>
<?php
}
else {
	$upload_image = "inline";

} 
?>
					
					<div class="form-group" style="display : <?= $upload_image ?>" >
						<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1"><?= wg_product_image[$language]?></label>
						<div class="form-group">
						<div class="row">
							<div class="col-sm-5">
									<input multiple="" type="file" id="id-input-file-3" name="img" />
							</div>
						</div>
					</div>
						</div>		

					</div>

					</div>
				</div>
			</div>

		</form>
		</div>
</div>