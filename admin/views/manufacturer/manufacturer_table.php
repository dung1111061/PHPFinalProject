<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 

			<!--  -->
			<?= $top_menu ?>

		</div>
		<div class="ace-settings-container" id="ace-settings-container"> 
			
			<?= $setting ?> 
		</div><!-- /.ace-settings-container -->
	</div>
</div>
<div class="row">
	<div class="col-xs-10">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<!-- manufacturer Table Content-->
		<div class="table-header">
			Results for " manufacturers"
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><?= tb_manufacturer_name_column ?></th>
						<th><?= tb_manufacturer_image_column ?></th>
						<th><?= tb_manufacturer_action_column ?></th>
					</tr>
				</thead>
				<tbody>
<?php

// import manufacturer into table
foreach ($data as $key=> $row) {
	$manufacturer_id = $row[db_manufacturer_id];
	$manufacturer_name = $row[db_manufacturer_name];
	$img = MANUFACTURER_IMAGE_PATH.$row[db_manufacturer_image];
	$alt = $row[db_manufacturer_image];
?>
<tr> 	
	<td> <?= $manufacturer_name ?> </td>								
	<td>
		<img style="width:100px; max-height: 150px;" src="<?=$img?>" alt="<?=$alt?>">	
	</td>
	

	<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="manufacturer.php?route=edit&id=<?php echo $manufacturer_id ?>" data-toggle="tooltip" title="<?= DETAILS_TOOLTIP_MESSAGE?>">
				<i class="ace-icon fa fa-pencil bigger-130" ></i>
			</a>

			<a class="red" href="manufacturer.php?route=details&action=delete&id=<?php echo $manufacturer_id ?>" onclick="return confirm('<?= DELETE_CONFIRM_MESSAGE ?>');" data-toggle="tooltip" title="<?= DELETE_TOOLTIP_MESSAGE?>">
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
						<a href="manufacturer.php?route=edit&id=<?php echo $manufacturer_id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
							<span class="green">
								<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="manufacturer.php?route=details&action=delete&id=<?php echo $manufacturer_id ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('<=? DELETE_CONFIRM_MESSAGE?>');">
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
		<a href="manufacturer.php?route=insert" data-toggle="tooltip" title="<?= INSERT_TOOLTIP_MESSAGE?>"/>
		<div class="btn btn-app btn-primary no-radius" > 
			<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
		</div>
		</a>
	</div>
</div> <!-- PAGE CONTENT END -->
