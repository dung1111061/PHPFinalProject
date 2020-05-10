<!-- page specific plugin scripts -->
<script src="views/assets/js/jquery.dataTables.min.js"></script>
<script src="views/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="views/assets/js/wizard.min.js"></script>
<script src="views/assets/js/jquery.nestable.min.js"></script>	

<!--  -->
<script>
	//
	$('#dynamic-table').DataTable( {
		bAutoWidth: true,
		"aoColumns": [
		  { "bSortable": true },
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

	//
	$('.dd').nestable();

	//
	$( ".dd-list" ).each(function() {
		$($(this).find("button")[0]).trigger("click");
	});

</script>

<!--  -->
<script>
	var $validation = false;
	$('#order-wizard-container')
	.ace_wizard({
		//step: 2 //optional argument. wizard will jump to step "2" at first
		//buttons: '.wizard-actions:eq(0)'
	})
	.on('actionclicked.fu.wizard' , function(e, info){
		if(info.step == 1 && $validation) {
			if(!$('#validation-form').valid()) e.preventDefault();
		}
	})

	// cập nhật trạng thái đơn hàng
	// Note: xử kiện click ở đây kg ảnh hưởng dữ liệu trên database, chỉ nhằm mục đích
	// cập nhật trạng thái cho người dùng khi page được load.
	if( $('#order-wizard-container').length ){
		// 
		orderStatusOnServer = $($('#order-wizard-container .steps')[0]).attr('data-active-step');
		
		//
		switch(orderStatusOnServer) {
		  case '1':

		    break;

		  case '2':

		    $(`.wizard-actions .btn-next`).trigger('click');
		    break;

		  case '3':
		    console.log("chua xay dung tinh nang cho don hang tam dung");
		    break;

		   case '4':
		    console.log("chua xay dung tinh nang cho don hang bi huy");
		    break;

		   case '5':
		    $(`.wizard-actions .btn-next`).trigger('click');
		    $(`.wizard-actions .btn-next`).trigger('click');
		    break;

		  default:
		    console.log(`Du lieu ${orderStatusOnServer}, tinh trang don hang, khong hop le`);

		} 

	}


// Xử lí click event cho nút chuyển trạng thái đơn hàng
$(".wizard-actions .btn-next").on("click",function(){
	//
	id = $(this).parent().attr('id'); 

	orderStatusOnServer = $($('#order-wizard-container .steps')[0]).attr('data-active-step');
	switch(orderStatusOnServer){
	  case '1':
	    var process_order_request = `order.php?action=shipping_order&id=${id}`;
	    break;

	  case '2':
	    var process_order_request = `order.php?action=accomplish_order&id=${id}`;
	    break;

	  case '5':
	  	window.location.href = "don-hang-moi.html";
	  	return;
	  break;  
	} 
	
	//
	$.ajax({
		url: process_order_request,
		method: 'GET',
		success: function(response){
			//
			var regex = /[+-]?\d+(?:\.\d+)?/g;
			var status, counter;
			while ( match = regex.exec(response) ) {
				//
				if( typeof counter == 'undefined' ) {
			        counter = 0;
			    }
			    counter++;
			    if(counter > 1){
			    	alert('Lỗi khi xử lí đơn hàng '+response);
			    	
			    	return; 
			    }
			    //	
				status = match[0];
				console.log(status);
			}

			//
			if(status == '2'){
				alert('Đơn hàng đang được giao');
				$($('#order-wizard-container .steps')[0]).attr('data-active-step','2');
				return;
			}
				
			//
			if(status == '5'){
				alert('Đơn hàng đã hoàn thành');
				$($('#order-wizard-container .steps')[0]).attr('data-active-step','5');
				return;
			}
		},
		error: function(){
			alert("send request failed");
		}
	});
});	
</script>