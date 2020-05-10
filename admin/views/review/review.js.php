<script >

  //
  review = $(".review-body .rating");
  rank = $(review).attr('data-rating');

  //
  for (i=0; i<rank; i++)
    review.append('<i class="fa fa-star" aria-hidden="true"></i>');

  //
  $(".review-body .approved").on('click', function() {
    
    //
    var review = $(this).closest('.review-body').attr('data-review');

    console.log(`approve review ${review}`);
    //
    $.ajax({
      url: `review.php?action=approve&id=${review}`,
      type: 'GET',
      success: function(response) {
        //
        if(isNaN(response)){
          alert(`Error: \n ${response}`);
          return;
        } 
        //
        alert("Duyệt bài thành công");
      }
    })
    .fail(function() {
      alert("Duyệt bài thất bại");

    })

    //
    $(this).closest('.action').html("<span class='label label-info'>approved</span>");

  });

  //
  $(".review-body .rejected").on('click', function() {
    
    //
    var id = $(this).closest('.review-body').attr('data-review');
    $.ajax({
      url: `review.php?action=reject&id=${id}`,
      type: 'GET',
    })
    .done(function(response) {
      if(isNaN(response)){
        alert(`Error: \n ${response}`);
        return;
      } 
      alert("Duyệt bài thành công");
    })
    .fail(function() {
      alert("Duyệt bài thất bại");

    })
    
    //
    $(this).closest('.action').html("<span class='label label-info'>rejected</span>");

  }); 

  
  
</script>

			
		