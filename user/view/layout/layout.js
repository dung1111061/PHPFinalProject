<script>
function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

// handler event on click to button, used for delete wishlist
// using ajax technique
function deleteWishlist(){
		//
		id = $(this).parent().attr('id'); 
	
		//
		$.ajax({
			url: `index.php?controller=customer_controller&action=deleteWishlist&id=${id}`,
			method: 'GET',
			success: function(id){
				//
				if(isNaN(id)){
					alert(`Error: \n ${id}`);
					return;
				} else if(! id){
					alert(`Product not in wishlist`);
					return;
				}

				alert(`${id} removed out wishlish success`);
				//
				quantity = $("#wishlist .qty").html() - 1; 
				$("#wishlist .qty").html(quantity);
				//
				$("#"+id).remove();

			},
			error: function(){
				alert("send request failed");
			}
		});
}

//
function deleteCart(){
		//
		id = $(this).parent().attr('id'); 
	
		//
		$.ajax({
			url: `index.php?controller=customer_controller&action=removeCart&id=${id}`,
			method: 'GET',
			success: function(id){
				//
				if(isNaN(id)){
					alert(`Error: \n ${id}`);
					return;
				} else if(! id){
					alert(`Product not in cart`);
					return;
				}

				alert(`${id} removed out cart success`);
				//
				totalQuantity = $("#cart > a > .qty").html() - 1; 
				$("#cart > a > .qty").html(totalQuantity);

				//
				quantity = $(`#cart #${id} .qty`).html() - 1; 
				$(`#cart #${id} .qty`).html(quantity);
				//
				if(quantity == 0)
					$("#"+id).remove();

			},
			error: function(){
				alert("send request failed");
			}
		});
}

</script>

<script>
	// class required login customer account
	$(".customer-login-required").each(function() {
		
	});

	// Rank for product
	$(".product-rating, .rating-stars, .review-rating").each(function() {
		rank = 2; // pass rank from database to javascript
		// get 5 star placeholder icon tag 
		list_star = $(this).find("i");

		// add star filled
		for (var i = 0; i < rank; i++) {
			$(list_star[i]).addClass('fa-star');
		}
		
		// add star empty
		for (var i = rank; i < 5; i++) {
			$(list_star[i]).addClass('fa-star-o');
		}
	});

	// add product to wishlist
	$(".product .product-btns .add-to-wishlist").on("click",function(){
		//
		id = $(this).parent().attr('id'); 

		$.ajax({
			url: `index.php?controller=customer_controller&action=addWishlist&id=${id}`,
			method: 'GET',
			success: function(productResponse){
				
				//
				if(! productResponse){
					alert(`Product in wishlist before`);
					return;
				}

				if( !IsJsonString(productResponse) ){ // not response, it mean exception throwned
					alert(`Error: \n ${productResponse}`);
					return;
				}
				
				console.log(`Response: \n ${productResponse}`);
				product = JSON.parse(productResponse);
				
				alert(`${product.id} add to wishlish success`);
				//
				quantity = parseInt($("#wishlist .qty").html(), 10) + 1; 
				$("#wishlist .qty").html(quantity);
				
				//
				product=`<div id="${id}" class="product-widget">
						<div class="product-img">
							<img src="${product.img}">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="#">${product.name}</a></h3>
						</div>
						<button class="delete" ><i class="fa fa-close"></i></button>
					</div>`;
				$("#wishlist .cart-list").append(product);
				$(`#wishlist .cart-list #${id} button`).on("click",deleteWishlist);
			},
			error: function(){
				alert("send request failed");
			}
		});
	});	

	// delete product in wishlist 
	$("#wishlist .product-widget button").on("click",deleteWishlist);
	
	// add to cart
	$(".product .add-to-cart button").on("click",function(){
		//
		id = $(this).parent().attr('id'); 

		$.ajax({
			url: `index.php?controller=customer_controller&action=addCart&id=${id}`,
			method: 'GET',
			success: function(productResponse){
				
				//
				if(! productResponse){
					alert(`No action on server`);
					return;
				}

				if( !IsJsonString(productResponse) ){ // not response, it mean exception throwned
					alert(`Error: \n ${productResponse}`);
					return;
				}
				
				console.log(`Response: \n ${productResponse}`);
				product = JSON.parse(productResponse);
				
				alert(`${product.id} add to wishlish success`);
				
				//
				totalQuantity = parseInt($("#cart > a > .qty").html(),10)  + 1; 
				$("#cart > a > .qty").html(totalQuantity);

				// tang so luong product them 1 
				if( $(`#cart #${id}`).length ) {
					quantity = parseInt($(`#cart #${id} .qty`).html(),10) + 1;
					$(`#cart #${id} .qty`).html(quantity);
					return;
				}
							
				// them vao product moi
				product=`<div class="product-widget" id="${product.id}">
							<div class="product-img">
								<img src="${product.img}">
							</div>
							<div class="product-body">
								<h3 class="product-name">
								<a href="index.php?controller=checkout">${product.name}</a>
								</h3>
								<h4 class="product-price">
								<span class="qty">1</span>
								${product.price}
								</h4>
							</div>
							<button class="delete"><i class="fa fa-close" ></i></button>
						</div>`;
				$("#cart .cart-list").append(product);
				$(`#cart .cart-list #${id} button`).on("click",deleteCart);
				$(`#cart .cart-list #${id} .qty`).html(1);

			},

			error: function(){
				alert("send request failed");
			}
		});
	});	

	// delete cart
	$("#cart .product-widget button").on("click",deleteCart);	

	// checkout button
	$("#cart .cart-btns button").on("click",function(){
		//
		products = $("#cart").find('.product-widget');
		form = $(this).next();

		//
		for (var i = 0; i < products.length; i++) {
			id = $(products[i]).attr("id");
			quantity = $(products[i]).find(".qty")[0].innerText;
			form.append(
				`<input type="text" name=cart[${i}][id] value=${id} >
				<input type="text" name=cart[${i}][quantity] value=${quantity} >
				`
			);
		}

		//
		form.submit();
	});
	
//==================================== ajax 
	// $("#customer-form").submit( function(e) {
		
	// 	e.preventDefault();
		
	// 	/* Act on the event */
	// 	data = new FormData( $("#customer-form")[0] );
	// 	$.ajax({
	// 		url: 'index.php?controller=customer_controller&action=verify',
	// 		method: 'POST',
	// 		data: data,

	// 		success: function(customer){
	// 			customer = JSON.parse(customer);
	// 			if(customer)
	// 				alert(customer.name);
	// 			else
	// 				alert("Authenticate failed");
	// 		},
	// 		error: function(error){
	// 			alert(`can not verify custommer account: ${error}`);
	// 		}

	// 	});
	// });

	// function logout(){
	// 	$.ajax({
	// 		// url: 'index.php?controller=customer_controller&action=addCart',
	// 		url: 'ajax_logout.php',
	// 		success: function(s){
	// 			if(s)
	// 				alert(s);
	// 			else
	// 				alert("add failed");
	// 		},

	// 	});
	// }

	// function addCart(id){
	// 	$.ajax({
	// 		// url: 'index.php?controller=customer_controller&action=addCart',
	// 		url: 'ajax_addCart.php?id='+id,
	// 		success: function(s){
	// 			if(!s)
	// 				alert("add success");
	// 			else
	// 				alert("add failed: " + s);
	// 		},

	// 	});

	// }
</script>