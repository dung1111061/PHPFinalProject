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

