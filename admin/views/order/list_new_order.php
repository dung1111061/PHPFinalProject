<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
<div class="breadcrumbs " id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
	<ul class="breadcrumb" style="margin-left: 0px">
		<i class="ace-icon fa fa-home home-icon"></i>
			<li > <a href="index.php"> Trang chủ </a> </li>
			<li class="active" > <a href="product.php"> Đơn hàng </a> </li> 
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
			Đơn hàng
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Tên khách hàng</th>
						<th>Sản phẩm được chọn</th>
						<th>Tổng giá thành</th>
						<th>Trạng thái</th>
					</tr>
				</thead>
				<tbody>
<?php

// import product into table
foreach ((array)$data as  $order) {
	$id 		= $order[db_order_id];
	$day        = $order['created_at'];
	$customer 	= $order[db_order_customerName];
	$price 		= $order[db_order_totalPrice];
	$status 	= $order['status'];
?>
<tr> 									
	<td> 
		<a class="green" href="quan-li-don-hang_id=<?= $id ?>.html" data-toggle="tooltip" title="Chi tiết đơn hàng"> <?= $id ?> 
	</td>
	<td > <?= $day ?> </td>
	<td > <?= $customer ?> </td>

	<td>
<div class="dd">
	<ol class="dd-list">
		<li class="dd-item" data-id="5">
			<div class="dd-handle">
				...
			</div>
			<ol class="dd-list">
			<?php 
				foreach ($order["products"] as $product) {

			?>
				<li class="dd-item item-orange" >
					<div class="dd-handle"> <?= $product["name"] ?> x <?= $product["quantity"] ?> </div>
				</li>
				
			<?php 
				} 
			?>
			</ol>
		</li>
	</ol>
</div>
	</td>

	<td class="order-price"> <?= $price ?> </td>
	<td >
		<span class="label label-sm label-warning"><?= $status ?></span>
	</td>
</tr>
<?php
}
?>
				</tbody>
			</table>
		</div>
	</div>
</div> <!-- PAGE CONTENT END -->
