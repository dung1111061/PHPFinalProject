<?php 
// Imported Data list
// route, m_data, p_data

$form_action = "category.php?action=insert"; // insert page
if ($route === "edit") { // edit product
	$form_action = "category.php?action=edit&id=".$id;
}

?>
<!-- Top bar -->
<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Trang chủ</a> </li>
					<li> <a href="category.php">Nhà sản xuất</a> </li>
			</ul><!-- /.breadcrumb -->
		</div>
	</div>
</div>

<!-- Widget -->
<?php
$wg_title= "Insert Category";
$wg_tag_general = "General";
if($route === "edit"){
	$wg_title = "Edit Category";
}
?>
<div class="col-sm-10 widget-container-col" id="widget-container-col-10">
	<div class="widget-box" id="widget-box-10">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"><?= $wg_title?></h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#general"><?= $wg_tag_general?></a>
					</li>
				</ul>
			</div>
		</div>

		<form id="form_product" class="form-horizontal" role="form" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" >
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">
					<div id="general" class="tab-pane in active">
						<!-- Field of general -->
						
							<div class="form-group">
								
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?="Name Category"?> </label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="<?= "Name"?>" class="col-xs-10 col-sm-5" name="name" required value="<?= $c_record[db_category_name]?>"/>
								</div>

							</div>

								<div class="hr hr-24"></div>

								<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-manufacturer"> Parent</label>

										<div class="col-xs-4 col-sm-3">
											<select class="chosen-select form-control" id="select-manufacturer" data-placeholder="" name="parent">
												<option value="">  </option>
										  	<?php
										  		$c_table = Category::getAll();
										  		foreach ($c_table as $key => $row) {
										  			$name = $row[db_category_name];
										  			$c_id = $row[db_category_id];
										  			$selected = $c_id === $c_record[db_category_parent_id] ? 'selected' : NULL;
										  	?>	

										  		<option value="<?= $c_id ?>" <?= $selected ?> > <?= $name ?></option>
											<?php
											}
											?>

											</select>

										</div>
								</div>

								
					</div>
						
					</div>
				</div>
			</div>

		</form>
		</div>
</div>


<!-- Edit vs Save buttons -->
<?php
		$save_display = "inline";
		$edit_display = "none";
	if ($route ==='edit') {
		$save_display = "none";
		$edit_display = "inline-block";
	}
?>

<div class="col-xs-2" style="text-align: right">
	<button id="save-button" class="btn btn-app btn-grey btn-xs radius-4 " data-toggle="tooltip" title="Thêm" style="display: <?=$save_display?>" >
		<i class="ace-icon fa fa-floppy-o bigger-160"></i>
		Save
	</button>

	<div id = "edit-button" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="Sửa" style="display: <?=$edit_display?>"> 
		<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
	</div>
	
</div>