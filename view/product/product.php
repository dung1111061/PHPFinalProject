<!-- 

Parameters:
	product
	reviews
	image_library
	relatedProducts
	
Dependency templates:
	product_details_representation
	product_tab_representation
 -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="trang-chu.html">Trang chủ</a></li>
					<?php foreach ((array)$breadcrumb as $category) { ?>
						<li> <?= $category ?> </li>
					<?php } ?>
					
					<li class="active"><?= $product[db_product_name] ?></li>
					
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->


<?php
//
$id = $product[db_product_id];
$name = $product[db_product_name];
$price = $product[db_product_price];
$rank   = $product[db_product_rank];
$old_price = $product[db_product_price];
$description = $product[db_product_description];
$quantity = $product[db_product_quantity];
$category = Category::find($product[db_product_category])[db_category_name] ;
$numberReview = count($reviews)
?>

<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						<?php 
							foreach ($image_library as $image) {
						?>
							<div class="product-preview">
								<img src="<?=$image?>" alt="">
							</div>
						<?php
							}
						?>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						<?php 
							foreach ($image_library as $image) {
						?>
							<div class="product-preview">
								<img src="<?=$image?>" alt="">
							</div>
						<?php
							}
						?>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
<?php 
	$productDetails = array(
		"id" => $id,
		"name" => $name,
		"rank" => $rank,
		"price" => $price,
		"old_price" => $old_price,
		"description" => $description,
		"quantity" => $quantity,
		"category" => $category,
		"numberReview" => $numberReview
	);
	$Template = new Template("module/product_details", $productDetails );
	$Template->render();
 ?>
					</div>
					<!-- /Product details -->
					
					<!-- Product tab -->
					<div class="col-md-12">
<?php 
	$data = array(
		"productId" => $id,
		"description" => $description,
		"reviews" => $reviews,
		"productRank" => $rank,
	);
	$Template = new Template("module/product_tab", $data );
	$Template->render();
?>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Sản phẩm liên quan</h3>
						</div>
					</div>

					<!-- product -->
<?php 
	foreach ($relatedProducts as $record) {
?>	
						<!-- product -->
						<div class="col-md-3 col-xs-6">
<?php
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
 ?>
						</div>
						<!-- /product -->
<?php
	}
?>

					<div class="clearfix visible-sm visible-xs"></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
