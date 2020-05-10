
<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Home</a> </li>
					<li> <a href="customer.php">Khách hàng</a> </li>
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
			Danh sách khách hàng
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>email</th>
						<th>Tên </th>
						<th>Số điện thoại </th>
						<th>Ngày tham gia</th>
						<th>Đăng kí nhận tin hot</th>
						<th>Số đơn đặt hàng</th>
						<th>Tổng số tiền tiêu thụ</th>

					</tr>
				</thead>
				<tbody>
<?php

// import product into table
foreach ( (array)$data as $row) {
	$email = $row[db_customer_email];
	$ten = $row[db_customer_firstName] . ' '.$row[db_customer_lastName];
	$telephone = $row[db_customer_telephone];
	$createDay = $row['created_at'];
	$subscriber = $row['subscriber'];
	$numOrder =  $row["numOrder"];
	$spendMoney = $row["spendMoney"];
?>
<tr> 									
	<td> <?= $email ?> </td>
	<td> <?= $ten ?> </td>
	<td > <?= $telephone ?> </td>
	<td > <?= $createDay ?> </td>
	<td><?= $subscriber ?></td>
	<td><?= $numOrder ?></td>
	<td><?= $spendMoney ?></td>

</tr>
<?php
}
?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-xs-2">
		<button class="export-button fas fa-file-export"> 
			<a href="?action=export2Excel"> export to excel</a>
		</button>	
	</div>
</div>
<style>
	.export-button {
			margin-top: 8px; 
		    background-color: #307ECC;
	}
	.export-button a {
		    color: white;
		    text-decoration: none;
		    margin: 15px 15px;
	}
</style>
<!-- <div><a href="javascript:void(0)" id="export-to-excel">Export to excel</a></div>
 <form action="?action=export2Excel" method="post" id="export-form">
						<input type="hidden" value='' id='hidden-type' name='ExportType'/>
 </form> -->
