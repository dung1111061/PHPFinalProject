<script type="text/javascript">
	$(".order-submit").closest("form").submit(function(e) {
		if( $("#terms").is(':checked') && $("input[type='radio']").is(':checked')){
			return;
		}
		alert('Vui lòng xác nhận phương thức thanh toán và đọc kĩ điều khoản');
		e.preventDefault();
	});

</script>