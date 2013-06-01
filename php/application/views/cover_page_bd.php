<style type="text/css">
	body {
		height: 100%;
		background: url(<?php echo base_url() . 'images/bondi.jpg'; ?>);
		background-size: cover;
		background-repeat: no-repeat;
	}
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
		height: 475px;
		width: 400px;
	}
	#sign_in {
		height: 325px;
		width: 400px;
	}	
	.details {
		background-color: black;
		background: rgba(0, 0, 0, 0.9);
		border-radius: 5px;
	}
</style>

<body>
	<div class="row">
		<h2 style="color:white">Catch up with old and new friends</h2>
		<hr></hr>
	</div>
	<div id="credentials" class="row">
		<div id="sign_up" class="large-6 columns details">
			<h2 style="color:white;">Register</h2>
			<hr></hr>
			<form>
				<span style="color:white;">Full Name</span><br /><br />
				<input type="text" id="full_name_info" name="full_name" />
				<span style="color:white;"`>Email</span><br /><br />
				<input type="text" id="email_info" name="email" />
				<span style="color:white;">Password</span><br /><br />
				<input type="text" id="password_info" name="password" />
				<span style="color:white;">Re-type Password</span><br /><br />
				<input type="text" id="re_password_info" name="re_password" />
				<input type="submit" class="success button" id="sign_up_btn" value="Get a life" />				
			</form>
		</div>
		<div id="sign_in" class="large-6 columns details">
			<h2 style="color: white;">Sign In</h2>
			<hr></hr>
			<form>
				<span style="color:white;">Email</span><br /><br />
				<input type="text" id="email_login" name="email" />
				<span style="color:white;">Password</span><br /><br />
				<input type="text" id="password_login" name="password" />
				<input type="submit" class="default button" id="sign_in_btn" value="Let's go" />				
			</form>
		</div>
	</div>
</body>