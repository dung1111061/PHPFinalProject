<!-- 
	paremeters:
	wishlist
 -->
<?php
	
	$quantity = isset($wishlist) ? count($wishlist) : null; 
?>
<div id="wishlist" class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		<i class="fa fa-heart-o"></i>
		<span>Yêu Thích</span>
		<div class="qty"><?= $quantity ?></div>
	</a>
	<div class="cart-dropdown"> 
		<div class="cart-list">
	<?php 
	foreach ( (array)$wishlist  as $product) {
	?>
			<div id="<?=$product[db_product_id]?>" class="product-widget">
				<div class="product-img">
					<img src="<?=$product[db_product_image]?>">
				</div>
				<div class="product-body">
					<h3 class="product-name">
						<a href="index.php?controller=product_controller&id=<?= $product[db_product_id] ?>
						"> <?= $product[db_product_name] ?> </a>
					</h3>
				</div>
				<button class="delete"><i class="fa fa-close"></i></button>
			</div>
	<?php 
	}
	?>
		</div>
	</div>
</div>



