// 
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>


<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
		
<script >

  function markReview(id,approved){    
    // if(approved){
   //    $( "#review-"+id+" .status"  ).append( "\
   //      Approved\
   //      " );
  	// } else{
   //    $( "#review-"+id+" .status" ).append( "\
   //      Rejected\
   //      " );
   //  }
   //  $("#review-"+id+" .action").remove();
    window.location = "review.php?action=update&id=" + id + "&status=" + approved;
  }

</script>

<style>
  // .review > div  {
  //   border-top: 1px solid grey;
  // }
  .review > div {
  margin-bottom: 20px;
  border-bottom: 1px solid grey;
}
</style>
			
		