<!-- 
	Template for display product details widget. 
	
PHP data:
	p_record: product need to add size attribute and link path to image
	related_products: list related product
	p_data
	m_data
	c_data
	
Note: This template should be migrate to module.
	In case insert product, recommended to define a default product.
	This is used to edit and insert product.
	Constants with prefix wg_... is used for language optional feature
	<form> tag marked id "form-product" and has no submit button and action for form. 
	So need to build external button to submit form as well as form action.	

Names:
	...
-->


<div class="widget-container-col">
	<div class="widget-box">
		<div class="widget-header widget-header-small">
			<h5 class="widget-title smaller"> Product </h5>

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

<form id="form_product" class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
		<div class="widget-body">
			<div class="widget-main padding-6">
				<div class="tab-content">

					<!--  Tab General -->
					<div id="general" class="tab-pane in active">
						<!-- Field of general -->
						
							<div class="form-group">
								
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>

								<div class="col-sm-4">
									<input type="text" id="form-field-1" placeholder="Tên sản phâm" class="col-xs-10 col-sm-12" name="name" required value="<?= $p_record[db_product_name]?>"/>
								</div>

							</div>

								<div class="hr hr-24"></div>
								
							<div class="form-group">	
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Model </label>

								<div class="col-sm-4">
									<input type="text"  placeholder="Model" class="col-xs-10 col-sm-12" name="model" value="<?= $p_record[db_product_model]?>"/>
								</div>
							</div>

								<div class="hr hr-24"></div>

								<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-manufacturer">Nhà sản xuất</label>

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
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-category">Loại sản phẩm</label>

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
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="select-related">Những sản phẩm liên quan</label>

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
	<!-- <div class="form-group">	
		<label class="col-sm-3 control-label no-padding-right"> Kích Thước </label> 
		
		<div class="col-sm-4">
			<input type="text" class="col-xs-10 col-sm-12 form-control input-mask-size" name="size" value="<?=$p_record["size"]?>" />
		</div>

	</div>  -->
<!--  -->
	<div class="hr hr-24"></div>
	<div class="form-group">	
		<label class="col-sm-3 control-label no-padding-right"> length </label>
		<div class="col-sm-4">
			<input type="text" class="col-xs-10 col-sm-12 form-control input-mask-size" name="length" value="<?=$p_record["length"]?>" placeholder='(cm)' />
		</div>
	</div>
	
	<div class="hr hr-24"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right"> height </label>
		<div class="col-sm-4">
			<input type="text" class="col-xs-10 col-sm-12 form-control input-mask-size" name="height" value="<?=$p_record["height"]?>" placeholder='(cm)' />
		</div>
	</div>

	<div class="hr hr-24"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right"> width </label>
		<div class="col-sm-4">
			<input type="text" class="col-xs-10 col-sm-12 form-control input-mask-size" name="width" value="<?=$p_record["width"]?>" placeholder='(cm)' />
		</div>
	</div>

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
	<label class="col-sm-3 no-padding-right control-label"  for="id-date-picker-1">Ngày mở bán</label>

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
	<label class="col-sm-3 no-padding-right control-label"  for="description">Mô Tả</label>
	
	<div class="row">
		<div class="col-sm-8">
		<script src="<?= COMPONENT_URL ?>ckeditor/ckeditor.js"></script>	
		<script src="<?= COMPONENT_URL ?>ckfinder_php_3.5.1/ckfinder/ckfinder.js"></script>
			<textarea id="description" name="description" class="form-control limited" minlength="10" name="description">
				<?= $p_record[db_product_description]?>	
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
			    // currentFolder: '<?= COMPONENT_PATH ?>ckfinder_php_3.5.1/ckfinder/userfiles/images'
			} );
		</script>	

	</div>
</div>
</div>
									
<!--  -->
<div class="hr hr-24" ></div>
<div class="form-group"  >
	<label class="col-sm-3 no-padding-right control-label"  for="image-product"> Ảnh đại diện </label>

	<div class="col-sm-5" >
		<img id="image-product" style="width:100px; max-height: 150px;" src="<?=$p_record[db_product_image]?>" />
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