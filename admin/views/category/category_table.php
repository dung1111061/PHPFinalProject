<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Home</a> </li>
					<li><a href="category.php">Loai</a> </li>
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
			Results for " Category"
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Name</th>

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
<?php

// import product into table
foreach ($data as $key=> $row) {
	$id = $row[db_category_id];
	$name = $row[db_category_name];
?>
<tr> 									

	<td> <?= $name ?> </td>

	<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="category.php?route=edit&id=<?php echo $id ?>" data-toggle="tooltip" title="details" onclick="confirm('not available yet'); return false;">
				<i class="ace-icon fa fa-pencil bigger-130" ></i>
			</a>

			<a class="red" href="category.php?route=details&action=delete&id=<?php echo $id ?>" onclick="confirm('not available yet'); return false;" data-toggle="tooltip" title="delete">
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
						<a href="category.php?route=edit&id=<?php echo $id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="category.php?route=details&action=delete&id=<?php echo $id ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('not available yet'); return false;">
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
		<a href="category.php?route=insert" data-toggle="tooltip" title="Insert new category" onclick="return confirm('not available yet'); return false;"/>
		<div class="btn btn-app btn-primary no-radius" > 
			<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
		</div>
		</a>
	</div>
</div> <!-- PAGE CONTENT END -->
