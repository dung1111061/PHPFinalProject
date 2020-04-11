<!-- 
	Template for details ò news 
	
Patameter:
	...
-->
<?php 
	$title = $new[db_new_title];
	$content = $new[db_new_content];

	$image = $new[db_new_image];
	$image = $image? NEW_IMAGE_URL.$image : PRODUCT_IMAGE_URL
								."image_not_found.png";
	$summary = $new[db_new_summary];
	$category = $new[db_new_category];
	$author = $new[db_new_author];
	$hot = $new[db_new_hot];
?>

<div class="widget-container-col">
	<div class="widget-box">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"> Tin tức </h5>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#general">Thông Tin Chung</a>
					</li>

					<li>
						<a data-toggle="tab" href="#other"> Nội dung </a>
					</li>
				</ul>
			</div>
		</div>

<form id="new_details" class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">

					<!--  Tab General -->
	<div id="general" class="tab-pane in active">
	<div class="form-group">
		
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiêu đề bài viết </label>

		<div class="col-sm-4">
			<input type="text" id="form-field-1"  class="col-xs-10 col-sm-12" name="title" required value="<?= $title?>"/>
		</div>

	</div>
	<div class="hr hr-24"></div>
	<div class="form-group">
		
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tác giả </label>

		<div class="col-sm-4">
			<input type="text" id="form-field-1"  class="col-xs-10 col-sm-12" name="author" required value="<?= $author?>"/>
		</div>

	</div>
	<div class="hr hr-24"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-category">Loại tin</label>

		<div class="col-xs-4 col-sm-3">
			<select class="chosen-select form-control "  id="select-category" data-placeholder="Choose a category..." name="category" >
				<option value="">  </option>
		  	<?php
		  		// import data for category dropdown list plugin
		  		foreach ($categories as  $row) {
		  			$name = $row[db_category_name];
		  			$c_id = $row[db_category_id];
		  			$selected = $c_id === $category ? 'selected' : NULL;

		  	?>	

		  		<option value="<?= $c_id ?>" <?= $selected ?> > <?= $name ?></option>
			<?php
			}
			?>

			</select>

		</div>	
	</div>	
	<div class="hr hr-24"></div>
	<div class="form-group">
		
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tóm tắt </label>

		<div class="col-sm-4">
			<textarea type="text" id="form-field-1"  class="col-xs-10 col-sm-12" name="summary" > <?= $summary?> </textarea>
		</div>

	</div>
	<div class="hr hr-24"></div>
	<div class="form-group"  >
		<label class="col-sm-3 no-padding-right control-label"  for="image-product"> Ảnh đại diện </label>
		<div class="col-sm-5" >
			<img id="image-product" style="width:100px; max-height: 150px;" src="<?= $image ?>" />
			<input  multiple="" type="file" id="image-input" name="img" />
		</div>
	</div>	
	<div class="hr hr-24"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3">Đánh dấu tin hot</label>

		<div class="controls col-xs-12 col-sm-9">
			<div class="row">
				<div class="col-xs-3">
					<label>
						<input name="hot_deal" class="ace ace-switch ace-switch-2" type="checkbox" <?= $hot ? "checked":""  ?>/>
						<span class="lbl"></span>
					</label>
				</div>
			</div>
		</div>
	</div>
</div>




<!--  Nội dung bài viết -->
<div id="other" class="tab-pane">

	
	<div class="row">

		<script src="<?= COMPONENT_URL ?>ckeditor/ckeditor.js"></script>	
		<script src="<?= COMPONENT_URL ?>ckfinder_php_3.5.1/ckfinder/ckfinder.js"></script>
			<textarea id="description" class="form-control limited" minlength="10" name="content">
				<?= $content?>	
			</textarea>
		<script>
			var editor = CKEDITOR.replace('description');
			CKFinder.setupCKEditor( editor, null, {
			    skin: 'jquery-mobile',
			    swatch: 'b',
			    onInit: function( finder ) {
			        finder.on( 'files:choose', function( evt ) {
			            var file = evt.data.files.first();
			            console.log( 'Selected: ' + file.get( 'name' ) );
			        } );
			    },
			    type: 'Files',

			} );
		</script>	

	
	</div>
</div>


					</div>
				</div>
			</div>

		</form>
		</div>
	</div>