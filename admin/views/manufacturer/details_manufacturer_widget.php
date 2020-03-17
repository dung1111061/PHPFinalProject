<?php 
// Imported Data list
// route, m_data, p_data

$language=language::english; 

$form_action = "manufacturer.php?action=insert"; // insert page
if ($route === "edit") { // edit 
	$form_action = "manufacturer.php?action=edit&id=".$id;
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
$wg_title[$language] = "Insert Manufacturer";
if($route === "edit"){
	$wg_title[$language] = "Edit Manufacturer";
}
$tags[1] = wg_manufacturer_tags[0];
$tag_name[1] = wg_manufacturer_tag_name[wg_manufacturer_tags[0]];

$tags[2] = wg_manufacturer_tags[1];
$tag_name[2] = wg_manufacturer_tag_name[wg_manufacturer_tags[1]];
?>

<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"><?= $wg_title[$language]?></h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#<?= $tags[1] ?>"> <?= $tag_name[1] ?></a>
					</li>

					<li>
						<a data-toggle="tab" href="#<?= $tags[2] ?>"><?= $tag_name[2] ?></a>
					</li>
				</ul>
			</div>
		</div>

		<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">
					<div id="<?= $tags[1] ?>" class="tab-pane in active">
						<!-- Field of general -->
						
						<div class="form-group">
							
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?=wg_manufacturer_name?> </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="<?= wg_manufacturer_name?>" class="col-xs-10 col-sm-5" name="name" required value="<?= $p_record[db_manufacturer_name]?>"/>
							</div>

						</div>

						<div class="form-group"  >
						<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1"><?= wg_manufacturer_image?></label>
<?php
	// insert feature
	$image = "none";
	$upload_image = "inline";
if ($route === "edit") {
	if($p_record[db_manufacturer_image]){
		$src = MANUFACTURER_IMAGE_PATH.$p_record[db_manufacturer_image];
		$alt = $p_record[db_manufacturer_image];
		$image = "inline";
		$upload_image = "none";		
	}

}
?>
<div class="col-sm-5" >
	<img id="upload_new_image" style="width:100px; max-height: 150px;display : <?= $image ?>" src="<?= $src?>" alt="<?= $alt?>" >
	<div class="form-group"  style="display : <?= $upload_image ?>" >
	<input multiple="" type="file" id="area-drop-image" name="img"  />
	</div>
</div>
						</div>	

					</div>

					<div id="<?= $tags[2] ?>" class="tab-pane">	

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