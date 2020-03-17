<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 

			<!--  -->
			<?php include_once "views/layouts/breadcrump.php"; ?>
			
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-10">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<!-- Product Table Content-->
		<div class="table-header">
			Results for " Products"
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><?= tb_product_image_column ?></th>
						<th><?= tb_product_name_column ?></th>
						<th><?= "Category" ?></th>
						<th><?= tb_product_price_column ?></th>
						<th><?= tb_product_manufacturer_column ?></th>
						<th><?= tb_product_quantity_column ?></th>
						<th><?= tb_product_action_column ?></th>
					</tr>
				</thead>
				<tbody>
<?php

// import product into table
foreach ($data as $key=> $row) {
	$product_id = $row[db_product_id];
	$img = $row[db_product_image];
	$price = $row[db_product_price];
	$old_price = $row["old_price"];
		
	$category = category::find($row[db_product_category])[db_category_name];
	$quantity = $row[db_product_quantity];
	$product_name = $row[db_product_name];
	$manufacturer_id = $row[db_product_manufacturer];
	$m_record = array_search($manufacturer_id, array_column($m_data, 'manufacturer_id'));
	$manufacturer = ($m_record !== false) ? $m_data[$m_record][db_manufacturer_name]: NULL;
?>
<tr> 									
	<td>
		<img style="width:100px; max-height: 150px;" src="<?=$img?>" ">	
	</td>
	<td> <?= $product_name ?> </td>
	<td > <?= $category ?> </td>
	<td class="product-price"> <?= $price ?> <del class="product-old-price"> <?= $old_price ?> </del> </td>
	
	<td><?= $manufacturer ?></td>

	<td >
		<span class="label label-sm label-warning"><?= $quantity ?></span>
	</td>

	<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="chi-tiet-san-pham-<?=formatString2URL($product_name) ?>_id=<?=$product_id?>.html" data-toggle="tooltip" title="<?= DETAILS_TOOLTIP_MESSAGE?>">
				<i class="ace-icon fa fa-pencil bigger-130" ></i>
			</a>

			<a class="red" href="product.php?action=delete&id=<?php echo $product_id ?>" onclick="return confirm('<?= DELETE_CONFIRM_MESSAGE ?>');" data-toggle="tooltip" title="<?= DELETE_TOOLTIP_MESSAGE?>">
				<i class="ace-icon fa fa-trash-o bigger-130"></i>
			</a>
		</div>

		<div class="hidden-md hidden-lg">
			<div class="inline pos-rel">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
					<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

					<li>
						<a href="chi-tiet-san-pham-<?php echo $product_name ?>_id=<?php echo $product_id ?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="product.php?action=delete&id=<?php echo $product_id ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('<=? DELETE_CONFIRM_MESSAGE?>');">
							<span class="red">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</td>
</tr>
<?php
}
?>

				</tbody>
			</table>
		</div>


	</div>
	<div class="col-xs-2"> 
		<a href="them-san-pham-moi.html" data-toggle="tooltip" title="<?= INSERT_TOOLTIP_MESSAGE?>"/>
		<div class="btn btn-app btn-primary no-radius" > 
			<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
		</div>
		</a>
	</div>
</div> <!-- PAGE CONTENT END -->
