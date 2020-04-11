
<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-xs-10"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Trang chủ</a> </li>
					<li> <a href="review.php">Review từ khách hàng</a> </li>
			</ul><!-- /.breadcrumb -->
		</div>
	</div>
</div>

<div class="container">
	<!--  -->
	<h3> 
		Các bài review chờ duyệt
	</h3> 


	<div class="row col-xs-10 ">
		<div class="row review-title">
				<div class="col-xs-3">
					<span > Tên sản phẩm </span> 
				</div>
				<div class="col-xs-3">
					<span > Tác giả </span>
				</div>	
				<div class="col-xs-4">
					Mô tả
				</div>	
				<div class="col-xs-2">
					<div class="action pull-right pos-rel dropdown-hover">
						<span >
							trạng thái
						</span>	
					</div>
				</div>
		</div>



		<?php 
		foreach ($reviews as $record) {
			$id = $record[db_review_id];
			$product = $record[db_product_name];
			$name = $record[db_review_name];
			$email = $record[db_review_email];
			$date_added = $record[db_created_at];
			$rating = $record[db_review_rank];
			$description = $record[db_review_description];
			$status = $record[db_review_status];
		?>
		<div class="row review-body" data-review="<?= $id ?>">

				<div class="col-xs-3 review-field">
					<span class="label label-primary arrowed-in arrowed-in-right"><?=$product?></span>
					
				</div>
				<div class="review-field col-xs-3">

					<h6 > <?=$name?> </h6>
					<div > <?=$date_added?> </div>
					<div class="rating" data-rating="<?= $rating ?>">
						
					</div>
				</div>	
				<div class="review-field col-xs-5">
					<span class="description"> <?=$description?> </span>
				</div>	
				<div class="review-field col-xs-1">
					<div class="action pull-right pos-rel dropdown-hover">
						<span class="label label-info">
							chờ
						</span>	
						<ul class="dropdown-menu dropdown-only-icon dropdown-caret dropdown-close dropdown-menu-right">
							<li>
								<button class="label label-success approved">
									<i class="ace-icon fa fa-check bigger-110"></i>
								</button>
							</li>

							<li>
								<button class="label label-secondly rejected">
									<i class="ace-icon fa fa-trash-o bigger-110"></i>
								</button>
							</li>
						</ul>		
					</div>
				</div>
		</div>

		<?php 
		} 
		?>	
	</div>
</div>
