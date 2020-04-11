<!-- 
	
	parameters:
	category_table: 
	new_product_tables[category id] : many new product table filter by category
	top_selling_tables[category id] : many top product table filter by category
		product table: table on database have formated before render
 -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./assets/img/shop01.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Bộ sưu tập<br>laptop</h3>
						<a href="index.php?controller=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./assets/img/shop03.png" alt="">
					</div>
					<div class="shop-body">
						<h3>bộ sưu tập <br> phụ kiện </h3>
						<a href="index.php?controller=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./assets/img/shop02.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Bộ sưu tập<br>camera</h3>
						<a href="index.php?controller=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" id="new-product">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản Phẩm Mới</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
						<?php						
							foreach ($category_table as $record) {
								$category_name = $record[db_category_name];
								$category_id = $record[db_category_id];
						?>
								<li class="">
									<a data-toggle="tab" href="#tab<?=$category_id?>" aria-expanded=""><?=$category_name?>
									</a>
								</li>
						<?php 
							} 
						?>

								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">

<?php 
foreach ($category_table as $category) {
	$category_id = $category[db_category_id];
	$table = $new_product_tables[ $category_id ];
?>
								<!-- tab  -->
								<div id="tab<?=$category_id?>" class="tab-pane">
									<div class="products-slick" data-nav="#slick-nav-1">
<?php
	
	// show list product
	foreach ( $table as $record) {

		$productData = [
			"id"    => $record[db_product_id], 
			"name"  => $record[db_product_name],
			"price" => $record[db_product_price],		
			"old_price" => $record["old_price"],
			"img"   => $record[db_product_image], 
			"discount"   => $record[db_product_discount],
			"rank" => $record[db_product_rank],
			"new" => $record[db_product_new]
		];

		$productTemplate = new Template("module/product", $productData );
		$productTemplate->render();
} 
?>
									</div>
									<div class="products-slick-nav"></div>
		</div> 		
		<!-- /tab -->				 
<?php 
} 
?>
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3>02</h3>
								<span>ngày</span>
							</div>
						</li>
						<li>
							<div>
								<h3>10</h3>
								<span>giờ</span>
							</div>
						</li>
						<li>
							<div>
								<h3>34</h3>
								<span>phút</span>
							</div>
						</li>
						<li>
							<div>
								<h3>60</h3>
								<span>giây</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">khuyến mãi tuần này</h2>
					<p>Bộ sưu tập mới</p>
					<a class="primary-btn cta-btn" href="#">Mua sắm ngay bây giờ</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->


<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" id= "top-selling">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Mặt Hàng Bán Chạy</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
						<?php
							foreach ($category_table as $record) {
						?>
								<li class="">
									<a data-toggle="tab" href="#top-selling-<?= $record[db_category_id] ?>" aria-expanded="">
										<?= $record[db_category_name] ?>
									</a>
								</li>
						<?php 
							} 
						?>

								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">

<?php 
foreach ($category_table as $category) {
	$category_id = $category[db_category_id];
	$table = $top_selling_tables[ $category_id ];

?>
								<!-- tab  -->
								<div id="top-selling-<?=$category_id?>" class="tab-pane">
									<div class="products-slick" data-nav="#slick-nav-1">
<?php
	// show list product
	foreach ( $table as $record) {
		$productData = [
			"id"    => $record[db_product_id], 
			"name"  => $record[db_product_name],
			"price" => $record[db_product_price],		
			"old_price" => $record["old_price"],
			"img"   => $record[db_product_image], 
			"discount"   => $record[db_product_discount],
			"rank" => $record[db_product_rank],
			"new" => $record[db_product_new]
		];

		$productTemplate = new Template("module/product", $productData );
		$productTemplate->render();
} ?>
									</div>
									<div class="products-slick-nav"></div>
		</div> 		
		<!-- /tab -->				 
<?php 
	} 
?>

							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

