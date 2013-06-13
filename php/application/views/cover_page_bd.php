<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/fdn/foundation.css'; ?>" />
<script src="<?php echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>

<script>
	$(document).ready(function () {
		/* Load background image */
		document.body.style.background = "url('<?php echo base_url() . 'images/blurred_lines.jpg'; ?>')";
		document.body.style.backgroundSize = 'cover';
		document.body.style.backgroundAttachment = 'fixed';
		
		
		$('#sign_up_btn').click(function () {
			var fields = new Array('full_name_info', 'username_info', 'user_email_info', 'password_info', 're_password_info');
			$.each(fields, function(key, value) {
				document.getElementById(value).style.backgroundColor = '#FFF';
			});			

			$.ajax({
				type	: 'POST',
				url		: '<?php echo site_url('credentials/register_user'); ?>',
				data	: $('#registration_form').serialize(),
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'empty_fields':
							document.getElementById('alert').innerHTML = 'Please make sure all fields have been filled in.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'invalid_fields':
							document.getElementById('alert').innerHTML = 'Make sure that each field has been correctly entered.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'user_taken':
							alert('User already exists');
							break;
						case 'user_registered':
							alert('User is registered');
							break;
						case 'critical_error':
							alert('A critical error has just occurred');
							break;
						default:
							break;
					};
				},
				error	: function(data) {
					alert("Something went wrong!");
				}
			});
			return false;
		});
		
		
		$('#sign_in_btn').click(function () {	
			var fields = new Array('email_login', 'password_login');
			$.each(fields, function(key, value) {
				document.getElementById(value).style.backgroundColor = '#FFF';
			});						
			$.ajax({
				type	: 'POST',
				url		: '<?php echo site_url('credentials/signin_user'); ?>',
				data	: $('#signin_form').serialize(),
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'empty_fields':
							document.getElementById('alert').innerHTML = 'Please make sure all fields have been filled in.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'invalid_fields':
							document.getElementById('alert').innerHTML = 'Make sure that each field has been correctly entered.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'login_error':
							alert('Login error');
							break;
						case 'logged_in':
							window.location = data.result;
							break;
						default:
							break;
					};
				},
				error	: function(data) {
					alert("Something went wrong!");
				}
			});
			return false;
		});
	});
</script>

<style type="text/css">
	#interest_box {
		height: 300px;
		width: 400px;
		background-color: #000;
		background: rgba(0, 0, 0, 0.9);
		position:relative;top:150px;
		border-radius: 5px;
	}
	#credentials {
		position:relative; top:25px;
	}
	#sign_up {
		height: auto;
		width: 375px;
	}
	#sign_in {
		height: auto;
		width: 375px;
	}	
	.details {
		background-color: black;
		background: rgba(0, 0, 0, 0.9);
		border-radius: 5px;
	}
	a:hover {
		text-decoration: underline;
	}
</style>

<body>
	<div class="row">
		<h3 style="color:white">Catch up with old and new friends</h3>
		<hr></hr>
	</div>
	<div class="row">
		<div data-alert class="alert-box alert"  id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>		
	</div>
	<div id="credentials" class="row">
		<div id="sign_up" class="large-6 columns details">
			<h3 style="color:white;">Register</h3>
			<hr></hr>
			<form id="registration_form">
				<span style="color:white;">Full Name</span><br /><br />
				<input type="text" id="full_name_info" name="full_name" />
				<span style="color:white;">Username</span><br /><br />
				<input type="text" id="username_info" name="username" />				
				<span style="color:white;"`>Email</span><br /><br />
				<input type="text" id="user_email_info" name="user_email" />
				<span style="color:white;">Password</span><br /><br />
				<input type="password" id="password_info" name="password" />
				<span style="color:white;">Re-type Password</span><br /><br />
				<input type="password" id="re_password_info" name="re_password" />
				<input type="submit" class="success button" id="sign_up_btn" value="Get a life" />				
			</form>
		</div>
		<div id="sign_in" class="large-6 columns details">
			<h3 style="color: white;">Sign In</h3>
			<hr></hr>
			<form id="signin_form">
				<span style="color:white;">Email</span><br /><br />
				<input type="text" id="email_login" name="user_email" />
				<span style="color:white;">Password</span><br /><br />
				<input type="password" id="password_login" name="password" />
				<input type="submit" class="default button" id="sign_in_btn" value="Let's go" />				
			</form>
		</div>
	</div>
</body>