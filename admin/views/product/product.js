 <!-- page specific plugin scripts  -->
 	<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
	<script src="assets/js/jquery.raty.min.js"></script>
	<script src="assets/js/bootstrap-multiselect.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/jquery-typeahead.js"></script>
	<script src="assets/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/daterangepicker.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/js/jquery.inputlimiter.min.js"></script>
	<script src="assets/js/chosen.jquery.min.js"></script>
	<script src="assets/js/jquery-ui.custom.min.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/js/spinbox.min.js"></script>
	<script src="assets/js/jquery.maskMoney.js"></script>
	// <script src="assets/js/jquery.maskedinput.min.js"></script>
	<script src="assets/js/jquery.mask.min.js"></script>

<!-- inline scripts related to this page  --> 
<script>  // Jquery plugins dependencies
if(!ace.vars['touch']) {
/**
 * [Single select and multiple select plugin ]
 * @param  {[type]} !ace.vars['touch'] [description]
 * @return {[type]}                    [description]
 */
 	// Add plugin chosen for class elements chosen-select
	// $('.chosen-select').chosen({allow_single_deselect:true}); 
	$('#select-manufacturer').chosen({allow_single_deselect:true}); 
	$('#select-related').chosen({allow_single_deselect:true}); 
	$('#select-category').chosen({allow_single_deselect:true}); 
	
	//resize the chosen on window resize
	$(window)
	.off('resize.chosen')
	.on('resize.chosen', function() {
		$('.chosen-select').each(function() {
			 var $this = $(this);
			 $this.next().css({'width': $this.parent().width()});
		})
	}).trigger('resize.chosen');
}


/**
 * Product date picker
 */
// 
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
	//show datepicker when clicking on the icon
	.next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

/**
 * Description
 */

$('textarea.limited').inputlimiter({
	remText: '%n character%s remaining...',
	limitText: 'min allowed : %n.'
});

/**
 * Trigger submit form
 */
	
	$( "#save-button" ).click(function() {
	  $( "#form_product" ).submit();
	});

	$( "#edit-button" ).click(function() {
	  $( "#form_product" ).submit();
	});


/**
 * Drop product image area
 */

	$('#image-input').ace_file_input({
		style: 'well',
		btn_choose: 'Drop files here or click to choose',
		btn_change: null,
		no_icon: 'ace-icon fa fa-cloud-upload',
		droppable: true,
		thumbnail: 'small'//large | fit
		//,icon_remove:null//set null, to hide remove/reset button
		/**,before_change:function(files, dropped) {
			//Check an example below
			//or examples/file-upload.html
			return true;
		}*/
		/**,before_remove : function() {
			return true;
		}*/
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			// alert(error_code);
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});

/**
 * Alert to confirm delete product
 */

/*
	Dynamic view of upload image area.
	View image if not has image in src attribute, view upload area
 */
	$('#image-product').css('display','none');
	dropArea = $('#image-product').next();
	dropArea.css('display','inline');
 	if ( $('#image-product').attr('src') ) {
 		$('#image-product').css('display','inline');
 		dropArea.css('display','none');
 	}
 	
 	// Click to image to use upload area
	$('#image-product').on('click', function(event) {
		$("#image-product").css( "display", "none" );
		dropArea.css( "display", "inline" );
	});
	// if user don't want to audit image, back to show image again
	// No implement yet

/**
 * price discount
 */

	$('#discount').ace_spinner({value:0,min:0,max:100,step:5, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});

/**
 * quantity product strored in warehouse
 */

	$('#quantity').ace_spinner({value:0,min:0,max:100,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});

/**
 * price
 */
 
	$('.input-mask-money').maskMoney({decimal:'.', precision: 3,suffix: ' VNĐ',
	                              thousands: ' ',affixesStay :true,selectAllOnFocus:false
	                              });

// Bad UX when input price directly after focus price field  
// $(document).ready(function() {
//   $( '#price' ).trigger('focus');

// });

/**
	Size
 */
	var options =  {
	 //  	onKeyPress: function(cep, e, field, options) {
	 //    var masks = ['YY x YY x YY', '9 x 9 x 9.9'];
	 //    var mask = (cep.length>6) ? masks[1] : masks[0];
	 //    $('.input-mask-size').mask(mask, options);
		// },
		onKeyPress : function(e){
			// Note: capture space to done an properties and continue input another one. 
			// 
			// console.log('A key was pressed!:', e.keyCode);
			// 
			// if(e.keyCode == "%20"){
			// 	console.log('space inputed');
			// }
		},
		clearIfNotMatch: false,
		'translation': {
	    	Y: {pattern: /[0-9]/}
	  	},
	  	//
	  	placeholder: "length x width x height (cm)"
	 // reverse: true
	};

 $('.input-mask-size').mask('YY.Y x YY.Y x YY.Y',options);

/**
 * Tooltip to show summary text box
 * @param  {String} ){	               $('[data-toggle [description]
 * @return {[type]}      [description]
 */
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
	// $('.tooltip-inner').css("max-width":"150px","width":"150px");

/**
	// Image is not reuploaded  
    // Drop area is not automatic upload image 
    // No click event on image product captured so image is not reuploaded 
 */

/**
 * [ module for validate form before send request
 * 	 Note: This function is not built completely
 * ]
 * @return {[type]} [description]
 */
 	// Validate form before send request
	function validate_form(){
		
		// validate form
		// 
		// if( !IsNumeric($("#price").val()) ) return false;
		//
		if( !validate_related_product_selection() ) return false;

		// Preprocess before submit form
		if (  dropArea.css("display") === "none" ) 
			//
			$("#image-input").removeAttr("name");

		return true;
	}

	// Validate related product field
	// Note: This function is not test
	function validate_related_product_selection(){
		// 
		if ( jQuery.isEmptyObject( $('#select-related') ) ) {
			var values = $('#select-related').val();
			if (values.length > parseInt(5)){
				alert("maximum related product allowed is 5");
				return false;
			} 		
		}
		return true;
	}

	// Validate numeric field
	// Note: This function is not test
	function IsNumeric(numstr)
	{
	    if (! numstr.match(/^\d+$/ ) ) {
	        alert("Only numeric values are allowed");
	        return false;
	    }

	    return true;
	}

	// get data in form 
	function getDatafromForm(){
		var dataArray = [];
		// preprocess for initial of form
		$("input").each(function(index, field){
			// array contains elements of form as objects
			var name  = $(field).attr('name');
			var value = $(field).val();
			var element = new Object();
			element[name] = value;
			// element = {name:value}; do not allow to pass a variable value to name of variable
			dataArray.push(element);

			// dataArray[name] = value; // it is not an array, just object
			
			
		});

		// return dataArray
		return dataArray;
	}
</script>
<style>
	.tooltip-inner {
	    max-width: 150px;
	    /* If max-width does not work, try using width instead */
	    width: 150px; 
	}

	/* Resize width of field of select generated by chosen plugin */
	#select_manufacturer_chosen, #select_category_chosen, #select_related_chosen{
		width: 250px !important;
	}
	 
	.product-price {
	  color: #D10024;
	  font-size: 14px;
	}

	.product-price .product-old-price {
	  font-size: 90%;
	  font-weight: 400;
	  color: #8D99AE;
	}
</style>