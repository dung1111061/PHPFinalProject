<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Máy Tính</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện Thoại</a></li>
									<li><a data-toggle="tab" href="#tab3">Máy Ảnh</a></li>
									<li><a data-toggle="tab" href="#tab4">Phụ Kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">


								<!-- tab Laptop -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">

<?php 
	$category_id = 1;
	$table = product::getAll();
	$table = product::filterCategory($category_id);
	foreach ($table as $record) {
		$id    = $record[db_product_id];
		$name  = $record[db_product_name];
		$price = $record[db_product_price];
		$price = $price? $price : sprintf("%.3f", 50); // default price to testing, it should be 0 as real case
		$img   = $record[db_product_image];
		$img   = $img? PRODUCT_IMAGE_PATH.$img : PRODUCT_IMAGE_PATH."default_laptop.png"; 
		$sale_label = "sale";

		$old_price = "";
		$discount   = $record[db_product_discount];
		// $discount   = 10;
		if ($discount) {
			$old_price = $price;
			$price = $old_price*(1.0 - sprintf("%.2f", $discount/100));
		}
		
		$rank = $record[db_product_rank];	

?>

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?=$img?>" alt="">
												<div class="product-label">
													<span class="sale">-<?=$discount?>%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$category?></p>
												<h3 class="product-name"><a href="product.php?id=<=$id?>"><?=$name?></a></h3>
												<h4 class="product-price">$<?=$price?> <del class="product-old-price">$<?=$old_price?></del></h4>
												<div class="product-rating">
											<?php
												$rank_format = array("-o","-o","-o","-o","-o");
												for ($index = 0; $index < $rank; $index++){
													$rank_format[$index] = "";
												}
											?>
													<i class="fa fa-star<?=$rank_format[0]?>"></i>
													<i class="fa fa-star<?=$rank_format[1]?>"></i>
													<i class="fa fa-star<?=$rank_format[2]?>"></i>
													<i class="fa fa-star<?=$rank_format[3]?>"></i>
													<i class="fa fa-star<?=$rank_format[4]?>"></i>	
													
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
<?php } ?>


									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->

<!-- tab SmartPhone -->
<div id="tab2" class="tab-pane">
									<div class="products-slick" data-nav="#slick-nav-1">

<?php 
	$category_id = 2;
	$table = product::getAll();
	$table = product::filterCategory($category_id);
	foreach ($table as $record) {
		$id    = $record[db_product_id];
		$name  = $record[db_product_name];
		$price = $record[db_product_price];
		$price = $price? $price : sprintf("%.3f", 50); // default price to testing, it should be 0 as real case
		$img   = $record[db_product_image];
		$img   = $img? PRODUCT_IMAGE_PATH.$img : PRODUCT_IMAGE_PATH."default_smartphone.png"; 
		$sale_label = "sale";

		$old_price = "";
		$discount   = $record[db_product_discount];
		// $discount   = 10;
		if ($discount) {
			$old_price = $price;
			$price = $old_price*(1.0 - sprintf("%.2f", $discount/100));
		}
		
		$rank = 4;	

?>

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?=$img?>" alt="">
												<div class="product-label">
													<span class="sale">-<?=$discount?>%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$category?></p>
												<h3 class="product-name"><a href="product.php?id=<=$id?>"><?=$name?></a></h3>
												<h4 class="product-price">$<?=$price?> <del class="product-old-price">$<?=$old_price?></del></h4>
												<div class="product-rating">
											<?php
												$rank_format = array("-o","-o","-o","-o","-o");
												for ($index = 0; $index < $rank; $index++){
													$rank_format[$index] = "";
												}
											?>
													<i class="fa fa-star<?=$rank_format[0]?>"></i>
													<i class="fa fa-star<?=$rank_format[1]?>"></i>
													<i class="fa fa-star<?=$rank_format[2]?>"></i>
													<i class="fa fa-star<?=$rank_format[3]?>"></i>
													<i class="fa fa-star<?=$rank_format[4]?>"></i>	
													
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
<?php } ?>


										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>

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