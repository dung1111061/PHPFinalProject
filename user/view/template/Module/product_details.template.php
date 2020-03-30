<!-- 

Parameters:
	id
	name
	description
	quantity
	category
	numberReview

Dependency templates:
	add2cart
	
-->
 
<div class="product-details">
	<h2 class="product-name"> <?= $name ?> </h2>
	<div>
		<div class="product-rating" >
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
		</div>
		<a class="review-link" href="#">$<?= $numberReview ?> Review(s) | Add your review</a>
	</div>
	<div>
		<h3 class="product-price">$<?= $price ?> <del class="product-old-price">$<?= $old_price ?></del></h3>
		<span class="product-available">In Stock</span>
	</div>
	<p><?= limit_words($description,10) ?>.</p>

	<div class="product-options">
		<label>
			Size
			<select class="input-select">
				<option value="0">X</option>
			</select>
		</label>
		<label>
			Color
			<select class="input-select">
				<option value="0">Red</option>
			</select>
		</label>
	</div>

	<div class="add-to-cart">
		<div class="qty-label">
			Qty
			<div class="input-number">
				<input type="number" value="<?= $quantity ?>">
			</div>
		</div>
	</div>
	
<?php 
	$cartData = array(
					"id" => $id
				);
	$cartTemplate = new Template("module/add2cart", $cartData );
	$cartTemplate->render();

?>
		
	

	<ul class="product-btns">
		<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
		<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
	</ul>

	<ul class="product-links">
		<li>Category:</li>
		<li><a href="#"><?= $category ?></a></li>
	</ul>

	<ul class="product-links">
		<li>Share:</li>
		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="#"><i class="fa fa-envelope"></i></a></li>
	</ul>

</div>