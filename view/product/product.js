<script>
	$("#review-form button").on("click",function(e){
		//
		id = $(this).closest('#product-tab').attr('data-product');
		
		reviewForm = document.getElementsByClassName('review-form')[0];
		var data2 = new FormData(reviewForm);
		$.ajax({
			url: `index.php?controller=product_controller&action=rate&id=${id}`,
			type: 'POST',
			data: data2,
		 	contentType: false,
			processData: false,
		})
		.success(function(response) {
			//
			if(isNaN(response)){
				alert(`Error: \n ${response}`);
				return;
			} 
			//
			alert(`review đang chờ duyệt`);

		})

		.always(function() {
			console.log("complete");
		});

	});
</script>