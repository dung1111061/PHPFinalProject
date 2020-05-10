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

		<!-- ace scripts -->
		<script src="views/assets/js/ace-elements.min.js"></script>
		<script src="views/assets/js/ace.min.js"></script>


<!-- inline scripts related to this page -->
<script> 
	var myTable = 
	$('#dynamic-table')
	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
	.DataTable( {
		bAutoWidth: false,
		"aoColumns": [
		  { "bSortable": false },
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


	$('#upload_new_image').on('click', function(event) {
		event.preventDefault();
		$("#upload_new_image").prev().css( "display", "none" );
		$("#upload_new_image").css( "display", "none" );
		$( "#upload_new_image").next().css( "display", "inline" );
		/* Act on the event */
	});

	// Tooltip: Show summary text box
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
	// $('.tooltip-inner').css("max-width":"150px","width":"150px");

// Trigger submit form
$( "#save-button" ).click(function() {
  $( "#form_product" ).submit();
});

$( "#edit-button" ).click(function() {
  $( "#form_product" ).submit();
});

	$('#area-drop-image').ace_file_input({
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

	</script>

	
	<style>
		/* Tooltip: decorate for tooltip */
		.tooltip-inner {
	    max-width: 150px;
	    /* If max-width does not work, try using width instead */
	    width: 150px; 
	}
	</style>