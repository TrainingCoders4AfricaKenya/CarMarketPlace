<!-- call controller and method action -->
<div id="login_form">
  <h1>Dealer Login</h1>
	<?php 
		echo form_open('dealer_login/validate_credentials'); //wen usr clik we send em to dlogin controller n validste credentials method called
		echo form_input('username', 'Username');
		echo form_password('password', 'Password');
		echo form_submit('submit', 'Login');
		echo anchor('dealer_login/register', 'Create Account');	
	?>
</div>		
	

