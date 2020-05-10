<!-- page specific plugin scripts -->
	<script src="views/assets/js/jquery.dataTables.min.js"></script>
	<script src="views/assets/js/jquery.dataTables.bootstrap.min.js"></script>


<!-- inline scripts -->
<script>  
	// Jquery plugins dependencies
	// Product dynamic table 
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
</script>


<!-- inline style sheet-->
<style>
	.tooltip-inner {
	    max-width: 150px;
	    /* If max-width does not work, try using width instead */
	    width: 150px; 
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
