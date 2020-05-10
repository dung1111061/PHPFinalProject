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
      null,
      null
    ],
    "aaSorting": [],
    select: {
      style: 'multi'
    }
  } );


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

  
</script>

<script>
  if( $('#image-product').length ){
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
  }
  
</script>

			
		