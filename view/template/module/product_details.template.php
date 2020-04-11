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
		Đánh giá
		<div class="product-rating" data-rank=<?= $rank ?>>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
		</div>
		
	</div>
	<div>
		<h3 class="product-price">$<?= $price ?> <del class="product-old-price">$<?= $old_price ?></del></h3>
		<span class="product-available">Còn hàng</span>
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
		
	

	<ul class="product-btns" id=<?= $id ?> >
		<li class="add-to-wishlist"><a href="#"><i class="fa fa-heart-o"></i> Đánh dấu sản phẩm yêu thích</a></li>
		<li><a href="#"><i class="fa fa-exchange"></i> So sánh</a></li>
	</ul>

	<ul class="product-links">
		<li>Loại:</li>
		<li><a href="#"><?= $category ?></a></li>
	</ul>

	<ul class="product-links">
		<li>Chia sẽ:</li>
		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="#"><i class="fa fa-envelope"></i></a></li>
	</ul>

</div>