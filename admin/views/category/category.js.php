		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="views/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="views/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="views/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="views/assets/js/jquery.dataTables.min.js"></script>
		<script src="views/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="views/assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="views/assets/js/jquery.raty.min.js"></script>
		<script src="views/assets/js/bootstrap-multiselect.min.js"></script>
		<script src="views/assets/js/select2.min.js"></script>
		<script src="views/assets/js/jquery-typeahead.js"></script>
		<script src="views/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="views/assets/js/bootstrap-timepicker.min.js"></script>
		<script src="views/assets/js/moment.min.js"></script>
		<script src="views/assets/js/daterangepicker.min.js"></script>
		<script src="views/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="views/assets/js/jquery.inputlimiter.min.js"></script>
		<script src="views/assets/js/dataTables.select.min.js"></script>
		<script src="views/assets/js/chosen.jquery.min.js"></script>
		<script src="views/assets/js/jquery-ui.custom.min.js"></script>
		<script src="views/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="views/assets/js/jquery.maskedinput.min.js"></script>
		<script src="views/assets/js/jquery.maskMoney.js" type="text/javascript"></script>
		<!-- ace scripts -->
		<script src="views/assets/js/ace-elements.min.js"></script>
		<script src="views/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
<script> 

//initiate dataTables plugin

$('#dynamic-table')
//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable( {
	bAutoWidth: true,
	"aoColumns": [
	  null,
	  { "bSortable": false }
	],
	"aaSorting": [],
	
	
	//"bProcessing": true,
    //"bServerSide": true,
    //"sAjaxSource": "http://127.0.0.1/table.php"	,

	//,
	//"sScrollY": "200px",
	//"bPaginate": false,

	//"sScrollX": "100%",
	//"sScrollXInner": "120%",
	//"bScrollCollapse": true,
	//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
	//you may want to wrap the table inside a "div.dataTables_borderWrap" element

	//"iDisplayLength": 50


	select: {
		style: 'multi'
	}
} );

// multiselect plugin intergration for manufacturer
// $('.multiselect').multiselect({
//  enableFiltering: true,
//  enableHTML: true,
//  buttonClass: 'btn btn-white btn-primary',
//  templates: {
// 	button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
// 	ul: '<ul class="multiselect-container dropdown-menu"></ul>',
// 	filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
// 	filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
// 	li: '<li><a tabindex="0"><label></label></a></li>',
//     divider: '<li class="multiselect-item divider"></li>',
//     liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
//  }
// });
if(!ace.vars['touch']) {
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
	//resize chosen on sidebar collapse/expand
	$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
		if(event_name != 'sidebar_collapsed') return;
		$('.chosen-select').each(function() {
			 var $this = $(this);
			 // $this.next().css({'width': $this.parent().width()});
		})
	});

	$('#chosen-multiple-style .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
		 else $('#form-field-select-4').removeClass('tag-input-style');
	});

}



// Trigger submit form
$( "#save-button" ).click(function() {
  $( "#form_product" ).submit();
});

$( "#edit-button" ).click(function() {
  $( "#form_product" ).submit();
});



</script>
<style>

	.tooltip-inner {
    max-width: 150px;
    /* If max-width does not work, try using width instead */
    width: 150px; 
}

</style>
