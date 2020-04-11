<script type="application/javascript">	
	//-- Filter funtion --//

 	/**
 	 * [deleteFilter description]
 	 * @param  {[type]} filtered_yet_flag [description]
 	 * @param  {[type]} url               [description]
 	 * @return {[type]}                   [description]
 	 */
	function deleteFilter(filtered_yet_flag,url) {
		if(! filtered_yet_flag){
			// if not filter yet just only reset form and do not refesh page
			// Bug on trigger reset
			$('#filter-form').trigger("reset");
			
		} else{
			// reload page without filter
			document.location.replace(url);
		}
	}
	
	// detect filter form has inputed by user
	/**
	 * [description]
	 * @param  {[type]} ){		$('.filter-box').each(function() {            				if($(this).hasClass('hidden')){												$(this).removeClass('hidden' [description]
	 * @return {[type]}                                       [description]
	 */
	// $('#filter-form')[0].addEventListener("change",function(){

	// 	$('.filter-box').each(function() { 	
	// 		if($(this).hasClass('hidden')){
	// 			// if filter button no exits and show filter button
				
	// 			$(this).removeClass('hidden');
	// 		} 
	// 		else { // if filter button exits, delete filter box if filter has became empty
	// 			// !Note: Feature is not available
	// 			// //  price filter inputed
	// 			// var empty = true;
	// 			// $('#filter-form input[type=""]').each(function(){
	// 			//    if($(this).val()!=""){
	// 			//       empty =false;
	// 			//       return false;
	// 			//     }
	// 			//  });

	// 			// //  manufacturer filter checked
	// 			// $('#filter-form input[type="checkbox"]').each(function(){
	// 			// 	var checked = $(this).is(":checked");
	// 			//    if(checked){
	// 			//       empty =false;
	// 			//       return false;
	// 			//     }
	// 			//  });

	// 			// if(empty){
	// 			// 	// filter form is empty
	// 			// 	$(this).addClass('hidden');
	// 			// }
	// 		}
	// 	});
	// });
	// 
	//-- Filter funtion --//


/**
 * 
 */

/**
 * Price slider using plug in noUiSlider
 * Note: Slider is disabled 3/13/2020
 * Note: Up and down button is disabled 2/12/2020
 */
	 
	
	// Input number
	// $('.input-number').each(function() {
	// 	var $this = $(this),
	// 	$input = $this.find('input'),
	// 	up = $this.find('.qty-up'),
	// 	down = $this.find('.qty-down');

	// 	down.on('click', function () {
	// 		var value = parseInt($input.val()) - 1;
	// 		value = value < 1 ? 1 : value;
	// 		$input.val(value);
	// 		$input.change();
	// 		updatePriceSlider($this , value)
	// 	})

	// 	up.on('click', function () {
	// 		var value = parseInt($input.val()) + 1;
	// 		$input.val(value);
	// 		$input.change();
	// 		updatePriceSlider($this , value)
	// 	})
	// });

	// var priceInputMax = document.getElementById('price-max'),
	// 		priceInputMin = document.getElementById('price-min');

	// priceInputMax.addEventListener('change', function(){
	// 	updatePriceSlider($(this).parent() , this.value)
	// });

	// priceInputMin.addEventListener('change', function(){
	// 	updatePriceSlider($(this).parent() , this.value)
	// });

	// function updatePriceSlider(elem , value) {
	// 	if ( elem.hasClass('price-min') ) {
	// 		console.log('min: ' + value )
	// 		priceSlider.noUiSlider.set([value, null]);
	// 	} else if ( elem.hasClass('price-max')) {
	// 		console.log('max: ' + value)
	// 		priceSlider.noUiSlider.set([null, value]);
	// 	}
	// }

	// // Price Slider
	// var priceSlider = document.getElementById('price-slider');
	// if (priceSlider) {
	// 		var min = 0;
	// 		var max = 1000000; // 1 bilion
	// 		var min_start = (document.getElementById('price-min').value) ? document.getElementById('price-min').value : null;
		
	// 		var max_start = (document.getElementById('price-max').value) ? document.getElementById('price-max').value : null;
	// 		noUiSlider.create(priceSlider, {
	// 			// start: [min_start, max_start], // bug on slider
	// 			connect: true,
	// 			step: 1,
	// 			range: {
	// 				'min': min,
	// 				'10%': [1000],
	// 				'50%': [10000],
	//         		'90%': [100000],
	// 				'max': max
	// 			},

	// 		});		
	// 	priceSlider.noUiSlider.on('update', function( values, handle ) {
	// 		var value = values[handle];
	// 		handle ? priceInputMax.value = value ? value : "" 
	// 		 : priceInputMin.value = value ? value : ""
	// 	});
	// }

/**
 * Add pseudo field to form for purpose
 * submit a GET form with query string params and hidden params disappear
 * ex save query string of controller
 */
 	
 	const urlParams = new URLSearchParams(window.location.search);
 	var controller 	= urlParams.get('controller');
 	var category = urlParams.get('category');
 	var hotDeal = urlParams.get('hot_deal');
 	var searching = urlParams.get('searching');

/**
 * Add pseudo field to form for purpose
 * submit a GET form with query string params and hidden params disappear
 * ex save query string of controller
 */
 	var queryObjs = [
 		{key: 'hot_deal'  , value: hotDeal}, 
 		{key: 'category'  , value: category}, 
 		{key: 'controller', value: controller},
 	];
 	
/**
 * Filter form
 */
 	// 
	filterForm = $("#filter-form");
	saveQueryString2Form(filterForm,queryObjs);

	/**
	 * [submitFilter Format Price before apply filter]
	 * @return {[type]} [description]
	 */
	function submitFilter(){
		$('#price-max').val($('#price-max').val().replace(' ',''));
		$('#price-min').val($('#price-min').val().replace(' ',''));
		$('#filter-form').submit();
	};


	//
	var url = "index.php?controller="+controller;
	if(category) url += "&category="+category;
	if(hotDeal) url += "&hot_deal="+hotDeal;

	// Redirect page if click button delete Filter
	$('.filter-infomation > button').on('click', function (e) {
		document.location.replace(url);
	})

	if( $('.store-pagination').length ){

		var activePage = 1;
		$('.store-pagination a').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			// get json data and build html of products
			// $.getJSON( "json/productTablesInStore.json", function( data ) {
			// 	table = data[page];

			// });

			//
			var page = parseInt( $(this).html() ); 
			
			// get html of products
			$.ajax({
				url: `index.php?controller=store&action=buildProductContent&page=${page}`,
			})
			.done(function(response) {
				$('.store-body').html(response);
			})
			.always(function() {
				console.log("complete");
			});

			// view on website
			$(`.store-pagination a[data-id=${activePage}]`).parent().removeClass('active');
			activePage = page;
			$(`.store-pagination a[data-id=${activePage}]`).parent().addClass('active');
		});
	}

</script>