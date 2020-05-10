
<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Home</a> </li>
					<li> Tin tức</li>
			</ul><!-- /.breadcrumb -->
		</div>
	</div>
</div>

<div class="row"><div class="col-xs-10">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<!-- Product Table Content-->
		<div class="table-header">
			Tất cả tin
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Thể loại </th>
						<th>tiêu đề</th>
						<th>Ảnh đại diện</th>
						<th>Tóm tắt </th>
						<th>Tác giả </th>
						<th>Ngày tạo </th>
						<th>Tin hot </th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php

// import product into table
foreach ( (array)$data as $row) {
	$id     = $row[db_new_id];
	$title     = $row[db_new_title];
	$author     = $row[db_new_author];
	$category  = $row[db_new_category];
	$summary   = $row[db_new_summary];
	$createDay = $row['created_at'];
	$hot_flag  = $row[db_new_hot] ? "Hot": "Không Hot";
	$image 	= 	$row[db_new_image];
	$image = 	$image? NEW_IMAGE_URL.$image : PRODUCT_IMAGE_URL
								."image_not_found.png";
?>
<tr> 	
	<td> <?= $category ?> </td>								
	<td> <?= $title ?> </td>
	<td> <img src="<?= $image ?>" style="width:100px" >  </td>
	<td> <?= $summary ?> </td>
	<td> <?= $author ?> </td>
	<td> <?= $createDay ?> </td>
	<td> <?= $hot_flag ?></td>
	<td>

		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="new.php?action=display_edit&id=<?= $id?>" data-toggle="tooltip" title="Sửa">
				<i class="ace-icon fa fa-pencil bigger-130" ></i>
			</a>

			<a class="red" href="new.php?action=delete&id=<?= $id ?>" onclick="return confirm('Xóa');" data-toggle="tooltip" title="Xóa">
				<i class="ace-icon fa fa-trash-o bigger-130"></i>
			</a>
			<a class="red" href="new.php?action=send&id=<?= $id ?>" onclick="return confirm('Gửi tin cho subscriber');" data-toggle="tooltip" title="Gửi">
				<i class="ace-icon fa fa-inbox bigger-130"></i>
			</a>
		</div>

		<div class="hidden-md hidden-lg">
			<div class="inline pos-rel">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
					<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
					<li>
						<a href="product.php?action=display_edit&id=<?= $id ?>" class="tooltip-success" data-rel="tooltip" title="Sửa">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="product.php?action=delete&id=<?= $id ?>" class="tooltip-error" data-rel="tooltip" title="Xóa" onclick="return confirm('Xóa tin ');">
							<span class="red">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="product.php?action=send&id=<?= $id ?>" class="tooltip-error" data-rel="tooltip" title="Gửi" onclick="return confirm('Gửi tin cho subscriber ');">
							<span class="red">
								<i class="ace-icon fa fa-email-o bigger-120"></i>
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
</div>
