<script>
	

// At starting time of client application, do it
	// first tab is actived by default
	$($("#new-product .section-nav li")[0]).addClass("active");
	$($("#new-product .tab-pane")[0]).addClass("active");
	$($("#top-selling .section-nav li")[0]).addClass("active");
	$($("#top-selling .tab-pane")[0]).addClass("active");
	// Rank for product
	$(".product-rating").each(function() {
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
</script>