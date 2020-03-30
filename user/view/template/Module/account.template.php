<a href="?controller=customer_controller&action=logout"> Thoat </a>
			<!-- Button trigger modal -->
			<a data-toggle="modal" data-target="#myModal">
			  <i class="fa fa-user-o"></i> Tài khoản
			</a>
			<!-- Modal login from tutorial republic -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-account">
		<div class="modal-content">
			<div class="modal-header">				
				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a data-toggle="tab" href="#log-in"><h4 class="modal-title">Login</h4></a>
				</li>

				<li>
					<a data-toggle="tab" href="#register"><h4 class="modal-title">Register</h4></a>
				</li>

			</ul>
			<div class="tab-content">
				<div class="tab-pane in active" id="log-in">
					<div class="signup-form">
<form action="?controller=customer_controller&action=verify" method="post">
	<div class="form-group">
		<i class="fa fa-user"></i>
		<input type="text" class="form-control" placeholder="email" name="email" required="required">
	</div>
	<div class="form-group">
		<i class="fa fa-lock"></i>
		<input type="password" class="form-control" placeholder="password" name="password" required="required">					
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
	</div>
</form>	
</div>
				</div>
				<div class="tab-pane" id="register"> 
<div class="signup-form">
    <form action="?controller=customer_controller&action=verify" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
				</div>
			</div>			
			</div>
<div class="modal-footer">
	<a href="#">Forgot Password?</a>
</div>
		</div>
	</div>
</div> 