<!-- 
Module view to display an representation of product, outlined by class "product"
Note: Navigate page should be handle by front end develope

HTML Structure: 
	<div class="product">
		.....
	</div>	

Parameter: 
	id: 
	name: 
	price: 
	old_price: 
	img: 
	discount: 
	rank:
	$new:
-->
<div class="product">
	<div class="product-img">
		<img src="<?=$img?>" alt="">
		<div class="product-label">
<?php
				if($discount){

?>			
			<span class="sale">-<?=$discount?>%</span>
<?php
				}
?>

<?php
				if($new){

?>
				<span class="new">NEW</span>
<?php
				}
			?>
			

		</div>
	</div>
	<div class="product-body">
		<p class="product-category"></p>
		<h3 class="product-name"><a href="product.php?id=<=$id?>"><?=$name?></a></h3>
		<h4 class="product-price">$
			<?=$price?>
<?php 
				if($discount){
?>		
			<del class="product-old-price"><?=$old_price?></del>
<?php
				}
?>

		</h4>
		<div class="product-rating" data=<?=$rank?>>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
			<i class="fa"></i>
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