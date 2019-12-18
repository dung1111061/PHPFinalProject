<?php 
// Imported Data list
// route, m_data, p_data

$language=language::english; 

$form_action = "index.php?route=details/insert&action=insert"; // insert page
if ($route === "details/edit") { // edit product
	$form_action = "index.php?route=details/edit&action=edit&origin_name=".$p_record[db_product_name];
}

?>
<div class="col-sm-8 widget-container-col" id="widget-container-col-10">
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
									<input type="text" id="form-field-1" placeholder="<?= wg_product_model[0]?>" class="col-xs-10 col-sm-5" name="model" value="<?= $p_record[db_product_model]?>"/>
								</div>
							</div>

								<div class="hr hr-24"></div>

								<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="food"><?= wg_product_manufacturer[0]?></label>

										<div class="col-xs-12 col-sm-9">
											<select id="food" class="multiselect" multiple="" name="manufacturer">
										  	<?php
										  		foreach ($m_data as $key => $row) {
										  			$name = $row["name"];
										  			$id = $row["manufacturer_id"];
										  			$selected = $row["manufacturer_id"] === $p_record[db_product_manufacturer_id] ? 'selected' : NULL;
										  	?>	

										  		<option value="<?= $id ?>" <?= $selected ?> > <?= $name ?></option>
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
							<textarea class="form-control limited" minlength="10" name="description"><?php 								 
									if ($route === "details/edit") {
										echo $p_record[db_product_description];
									} else {
										echo 'pseudo description';
									}     
								?></textarea>
						</div>
					</div>
						</div>

					<div class="hr hr-24"></div>
					<div class="form-group">
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

		<div class="col-sm-4">
			<button class="btn btn-app btn-grey btn-xs radius-4" id="save-button" data-toggle="tooltip" title="<?= SAVE_TOOLTIP_MESSAGE?>">
				<i class="ace-icon fa fa-floppy-o bigger-160"></i>
				Save
			</button>
				<?php
					if ($route ==='details/edit') {
				?>
				<div id = "id-disable-check" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="<?= EDIT_TOOLTIP_MESSAGE?>"> 
					<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
				</div>
				<?php
					}
				?>		
		</div>