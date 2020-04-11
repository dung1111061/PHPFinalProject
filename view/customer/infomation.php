<div class="section">
	<div class="container">
		<div class="row ">
			<form id = "profile" action="?controller=customer_controller&action=updateProfile" method="post">
				<div class="col-xs-6">
					<div class="form-group"> 
						<label class="col-xs-2" for="lName"> Tên:  </label> 
						<input name="lName" type="text" value="<?= $lastName ?>">
					</div> 
					<div class="form-group">
						<label class="col-xs-2" for="fName"> Họ:  </label> 
						 <input name="fName" type="text" value="<?= $firstName ?>">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="tel"> Số điện thoại:  </label> 
						 <input name="tel" type="text" value="<?= $telephone ?>">
					</div>			

				</div>
				<button type="submit" >Cập nhập</button>		
			</form>
		</div>
	</div>
</div>
<script>
	document.getElementById('profile').getElementsByTagName('button').addEventListener("submit", 
		function(event){
			 event.preventDefault();
		});	
</script>


