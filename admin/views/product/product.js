		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
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
		<script src="assets/js/dataTables.select.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
<script> 

//initiate dataTables plugin
var myTable = 
$('#dynamic-table')
//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable( {
	bAutoWidth: false,
	"aoColumns": [
	  { "bSortable": false },
	  null, null,null, null, null,
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
			 $this.next().css({'width': $this.parent().width()});
		})
	});



}


// date picker plugin intergration
	//datepicker plugin
	//link
$('.date-picker').datepicker({
	autoclose: true,
	todayHighlight: true
})
//show datepicker when clicking on the icon
.next().on(ace.click_event, function(){
	$(this).prev().focus();
});

$('textarea.limited').inputlimiter({
	remText: '%n character%s remaining...',
	limitText: 'min allowed : %n.'
});
// Trigger submit form
$( "#save-button" ).click(function() {
  $( "#form_product" ).submit();
});


// Edit Button
$('#id-disable-check').on('click', function() {;
	if($('#save-button').attr('disabled') === undefined) {
		$('#form_product input[type="text"],textarea').each(function( key,value ) {
		  value.setAttribute('readonly','true');
		});
		$('#save-button,#form_product select').each(function( key,value ) {
		  value.setAttribute('disabled','true');
		});


	} else {
		$('#form_edit input[type="text"],textarea').each(function( key,value ) {
		  value.removeAttribute('readonly');
		});
		$('#save-button,#form_edit select').each(function( key,value ) {
		  value.removeAttribute('disabled');
		});

	}
});

// Drop file button
$('#id-input-file-3').ace_file_input({
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

// Alert to confirm delete product
$('#upload_new_image').on('click', function(event) {
	event.preventDefault();
	$("#upload_new_image").prev().css( "display", "none" );
	$("#upload_new_image").css( "display", "none" );
	$( "#upload_new_image").next().css( "display", "inline" );
	/* Act on the event */
});

// Tooltip to show summary text box
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
// $('.tooltip-inner').css("max-width":"150px","width":"150px");

</script>
<style>

	.tooltip-inner {
    max-width: 150px;
    /* If max-width does not work, try using width instead */
    width: 150px; 
}
</style>