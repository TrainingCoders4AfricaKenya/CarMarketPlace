<h1>Create an Account</h1>

<fieldset>
	<legend>Personal Information</legend>
	<?php 
		echo form_open('dealer_login/createMember'); //post action to dealer_login controller createMember method
		echo form_input('Name', set_value('Name', 'Your Name'));
		echo form_input('Contact', set_value('Contact', 'Contact Address'));
		echo form_input('Phone1', set_value('Phone1', 'Your Phone number'));
		echo form_input('Phone2', set_value('Phone2', 'Other Phone Number'));
		echo form_input('Country', set_value('Country', 'Enter Country'));
		echo form_input('City', set_value('City', 'Enter your city'));
		
		//name: <?php echo form_input('Name', set_value('Name'))>
	?>
</fieldset>

<fieldset>
	<legend>Login Info</legend>
	<?php 
		echo form_input('Email', set_value('Email', 'Input your email'));
		echo form_input('username', set_value('username', 'Input your UserName'));
		echo form_input('password', set_value('password', 'Input Password'));
		echo form_input('password2', set_value('password2', 'Confirm your Password'));
		
		echo form_submit('submit', 'Create Account');
	?>
	
	<?php echo validation_errors('<p class="error">'); ?>
</fieldset>