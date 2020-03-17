<script src="assets/js/bootstrap-multiselect.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>
<script>
	//
	$('.chosen-select').chosen({allow_single_deselect:true}); 
	$('.chosen-select').chosen({allow_single_deselect:true});

	//resize the chosen on window resize
	$(window)
	.off('resize.chosen')
	.on('resize.chosen', function() {
		$('.chosen-select').each(function() {
			 var $this = $(this);
			 $this.next().css({'width': $this.parent().width()});
		})
	}).trigger('resize.chosen');

	
	
</script>

<style>
#form_field_select_category_chosen, #form_field_select_manufacturer_chosen{
		width: 450px !important; 
	}
</style>