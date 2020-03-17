
<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs ace-save-state" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<?php include_once "views/layouts/breadcrump.php"; ?>
		</div>
		
	</div>
</div>

<?php 
	foreach ($reviews as $record) {
		$id = $record[db_review_id];
		$product = $record[db_product_name];
		$name = $record[db_review_name];
		$email = $record[db_review_email];
		$date_added = $record[db_create_at];
		$rating = $record[db_review_rating];
		$description = $record[db_review_description];
		$status = $record[db_review_status];
?>
<div id="review-<?=$id?>" class="review row border border-success">
		<div class="col-xs-8">
			<div class="col-xs-3">
				<?=$product?>
			</div>
	<div class="col-xs-3">
		<div class="row"><?=$name?></div>
		<div class="row"><?=$date_added?></div>
		<div class="row"><?=$rating?></div>
	</div>	
	<div class="col-xs-5">
		<?=$description?>
	</div>	
	<div class="col-xs-1">

		<div class="action pull-right pos-rel dropdown-hover" style="display: <?= $status===NULL?"inline":"none"?>">
			<span class="label label-info">pending</span>	
			<ul class="dropdown-menu dropdown-only-icon dropdown-caret dropdown-close dropdown-menu-right">
			<li>
					
					<button class="label label-success" onclick="markReview(<?=$id?>,true)">
						
						<i class="ace-icon fa fa-check bigger-110"></i>
					
					</button>
					
			</li>

			<li>
					<button class="label label-danger" onclick="markReview(<?=$id?>,false)">
						<i class="ace-icon fa fa-trash-o bigger-110"></i>
					</button>
			</li>
			</ul>		
		</div>
		<span class="status">
			<span style="display: <?= $status==="1"?"inline":"none"?>"> Approved </span>
			<span style="display: <?= $status==="0"?"inline":"none"?>"> Rejected </span>
		</span>
	</div>
		</div>

</div>

<?php } ?>
