<?php
$id = $_GET["id"];
$related_ids = array_column(relatedProduct::get($id), db_relatedproduct_related_id);


?>
<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<!-- product -->
					
						<?php 
								foreach ($related_ids as $related_id) {
									$record = product::find($related_id);
									$id    = $related_id;
									$name  = $record[db_product_name];
									$price = $record[db_product_price];		

									$img   = $record[db_product_image];
									$img   = $img? PRODUCT_IMAGE_PATH.$img : PRODUCT_IMAGE_PATH."default_laptop.png"; 
									$sale_label = "sale";

									$old_price = $record["old_price"];

									$discount   = $record[db_product_discount];

									
									$rank = $record[db_product_rank];
									?>

<!-- product -->
<div class="col-md-3 col-xs-6">
	<div class="product">
		<div class="product-img">
			<img src="<?=$img?>" alt="">
			<div class="product-label">
				<span class="sale">-<?=$discount?>%</span>
				<span class="new">NEW</span>
			</div>
		</div>
		<div class="product-body">
			<p class="product-category"></p>
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
				<button class="quick-view" onclick="$(this).next()[0].click()">
					<i class="fa fa-eye" ></i><span class="tooltipp">details view</span>
				</button>
				<a href="product.php?id=<?=$id?>"> </a>
			</div>

		</div>
		<div class="add-to-cart">
			<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
		</div>
	</div>
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