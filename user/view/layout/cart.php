<!-- 
	Cart template tao ra mot dropdown cart
	parameters:
	cart: array contains many products and total 
		products
			id
			name
			image
			quantity
			price
		Total price
		total Quantity
 -->

<div class="dropdown" id="cart">
	<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		<i class="fa fa-shopping-cart"></i>
		<span>Giỏ Hàng</span>
		<div class="qty"><?= $cart["totalQuantity"] ?></div>
	</a>
	<div class="cart-dropdown">
		<div class="cart-list">
			
		<?php 
			// $totalPrice = 0;
			foreach ((array)$cart["products"]  as $product) {
		?>	
			<div class="product-widget" id="<?= $product[db_product_id] ?>">
				<div class="product-img">
					<img src="<?=$product[db_product_image]?>">
				</div>
				<div class="product-body">
					<h3 class="product-name">
						<a href="index.php?controller=product_controller&id=<?= $product[db_product_id] ?>
						"> <?= $product[db_product_name] ?> </a>
					</h3>
					<h4 class="product-price">
						<span class="qty"><?=$product["quantity_cart"]?></span>
						<?= $product[db_product_price] ?>
					</h4>
				</div>
	
				<button class="delete"><i class="fa fa-close" ></i></button>

			</div>
		<?php 
			}
		?>
		</div>
		<div class="cart-summary">
			<h5><?= $cart["totalQuantity"] ?> Item(s) selected</h5>
 			<!-- <h5>SUBTOTAL: $<?= $cart["totalPrice"] ?></h5>   -->
		</div>
		<div class="cart-btns">
			<button >  Checkout<i class="fa fa-arrow-circle-right"></i> </button>
			<form action="index.php?controller=checkout" class="hidden" method="post">
			</form>
		</div>
	</div>
</div>


									