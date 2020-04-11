<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
<div class="breadcrumbs " id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
	<ul class="breadcrumb" style="margin-left: 0px">
		<i class="ace-icon fa fa-home home-icon"></i>
			<li > <a href="index.php"> Trang chủ </a> </li>
			<li class="active" > <a href="product.php"> Sản phẩm </a> </li> 
	</ul><!-- /.breadcrumb -->
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
			Sản phẩm
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Ảnh đại diện</th>
						<th>Tên </th>
						<th>Loại </th>
						<th>Giá tiền</th>
						<th>Nhà sản xuất</th>
						<th>Số lượng</th>
						<th></th>
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
	$category = Category::find($row[db_product_category])[db_category_name];
	$quantity = $row[db_product_quantity];
	$product_name = $row[db_product_name];
	$manufacturer = Manufacturer::find($row[db_product_manufacturer])[db_manufacturer_name];
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
			<a class="green" href="chi-tiet-san-pham-<?=formatString2URL($product_name) ?>_id=<?=$product_id?>.html" data-toggle="tooltip" title="Sửa">
				<i class="ace-icon fa fa-pencil bigger-130" ></i>
			</a>

			<a class="red" href="product.php?action=delete&id=<?php echo $product_id ?>" onclick="return confirm('Xóa');" data-toggle="tooltip" title="Xóa">
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
						<a href="chi-tiet-san-pham-<?php echo $product_name ?>_id=<?php echo $product_id ?>.html" class="tooltip-success" data-rel="tooltip" title="Sửa">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="product.php?action=delete&id=<?php echo $product_id ?>" class="tooltip-error" data-rel="tooltip" title="Xóa" onclick="return confirm('delete product');">
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
		<a href="them-san-pham-moi.html" data-toggle="tooltip" title="Thêm "/>
		<div class="btn btn-app btn-primary no-radius" > 
			<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
		</div>
		</a>
	</div>
</div> <!-- PAGE CONTENT END -->
