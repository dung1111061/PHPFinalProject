<!-- 

parameters:

 -->
<?php 

$form_action = "manufacturer.php?action=insert"; // insert page
if ($route === "edit") { // edit 
	$form_action = "manufacturer.php?action=edit&id=".$id;
}

?>

<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Home</a> </li>
					<li> <a href="manufacturer.php">Nhà sản xuất</a> </li>
			</ul><!-- /.breadcrumb -->
		</div>
	</div>
		
</div>



<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller">Nhà sản xuất</h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#1"> Loại</a>
					</li>

					<li>
						<a data-toggle="tab" href="#2">Chi tiết</a>
					</li>
				</ul>
			</div>
		</div>

		<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">
					<div id="1" class="tab-pane in active">
						<!-- Field of general -->
						
						<div class="form-group">
							
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên  </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Tên" class="col-xs-10 col-sm-5" name="name" required value="<?= $p_record[db_manufacturer_name]?>"/>
							</div>

						</div>

						<div class="form-group"  >
						<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1">Ảnh</label>
<?php
	// insert feature
	$imageDisplay = "none";
	$uploadImgDisplay = "inline";
	$src = "";
	$alt = "";
if ($route === "edit") {
	if($p_record[db_manufacturer_image]){
		$src = MANUFACTURER_IMAGE_URL.$p_record[db_manufacturer_image];
		$alt = $p_record[db_manufacturer_image];
		$imageDisplay = "inline";
		$uploadImgDisplay = "none";		
	}

}
?>
<div class="col-sm-5" >
	<img id="upload_new_image" style="width:100px; max-height: 150px;display : <?= $imageDisplay ?>" src="<?= $src?>" alt="<?= $alt?>" >
	<div class="form-group"  style="display : <?= $uploadImgDisplay ?>" >
	<input multiple="" type="file" id="area-drop-image" name="img"  />
	</div>
</div>
						</div>	

					</div>

					<div id="2" class="tab-pane">	

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
	<button id="save-button" class="btn btn-app btn-grey btn-xs radius-4 " data-toggle="tooltip" title="Save Change" style="display: <?=$save_display?>" >
		<i class="ace-icon fa fa-floppy-o bigger-160"></i>
		Save
	</button>

	<div id = "edit-button" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="Sửa" style="display: <?=$edit_display?>"> 
		<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
	</div>
	
</div>