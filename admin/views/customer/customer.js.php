<!-- page specific plugin scripts -->
<script src="views/assets/js/jquery.dataTables.min.js"></script>
<script src="views/assets/js/jquery.dataTables.bootstrap.min.js"></script>

<script >

  $('#dynamic-table').DataTable( {
    bAutoWidth: true,
    "aoColumns": [
      { "bSortable": true },
      null,
      null,
      null, 
      null,
      null, 
      null
    ],
    "aaSorting": [],
    select: {
      style: 'multi'
    }
  } );

  
  
</script>

<!-- <script> 			
$(document).ready(function() {
jQuery('#Export to excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
  case 'export-to-excel' :
  $('#hidden-type').val(target);
  //alert($('#hidden-type').val());
  $('#export-form').submit();
  $('#hidden-type').val('');
  break
}
});
    });
</script>		 -->