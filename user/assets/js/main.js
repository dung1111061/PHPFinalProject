/**
 * [saveQueryString2Form Add pseudo field to form ]
 * @param  {[type]} form       [reference form]
 * @param  {[type]} queryParams[array contains some parameter format 
 *                             	as javascript object]
 * queryParams = [
	{key: 'name of parameter'  , value: 'value of param'}, // parammeter
	...
	];
 * @return {[type]}            [description]
 */
function saveQueryString2Form(form,queryParams){
	queryParams.forEach(param => {
		if(param.value){
			pseudoField = "<input class='hidden' type=text name="+param.key+" value='"+param.value+"'/>";
			$(form).append(pseudoField);
		}
	});

	// 	$.each(queryParams, function(param) {
	// 	... do same
// });
}

(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});

	/////////////////////////////////////////

	// Products Slick
	$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

	// Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#product-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
					vertical: false,
					arrows: false,
					dots: true,
        }
      },
    ]
  });

	// Product img zoom
	var zoomMainProduct = document.getElementById('product-main-img');
	if (zoomMainProduct) {
		$('#product-main-img .product-preview').zoom();
	}

 	// Get query string params
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
 		{key: 'controller', value: controller?controller:"store"},
 	];

 	//
 	var searchingForm = $("#searching-field").parent();
 	saveQueryString2Form(searchingForm,queryObjs);

 	//
 	var submitButton = $("#searching-field").next();
	submitButton.on('click', function (e) {
		keywork = $("#searching-field").val();
		if(keywork === "") e.preventDefault();
		// User guide:
	 	// need to delete filter if no keeping searching filter, 
	 	// not allow searching with empty input.
		// searching feature only available on store page.
	});

	// Mark active page which request coming.
	var list_link = $("#responsive-nav  li");
	length = list_link.length;

	// Marking diagram
	breakme: if(controller === "store") {
		if(hotDeal) {
			$(list_link[length-2]).addClass('active');
			break breakme;
		}

		if(category)
			for (var i = 1; i < length-2; i++) {
				var href = $(list_link[i]).find("a").attr("href");
				if( href.search("category="+category)!==-1 ){
					$(list_link[i]).addClass('active');
					break breakme;
				}
			}			 

		$(list_link[length-1]).addClass('active');

	} else { // trang chu
		$(list_link[0]).addClass('active'); 
	}

	
	

})(jQuery);

