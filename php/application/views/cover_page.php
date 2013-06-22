<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<title>Get a life!</title>
	
	<link rel="stylesheet" href="<?php echo base_url() . 'css/fdn/foundation.css'; ?>" />
    <script src="<?php echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>
</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

<style type="text/css">
	body {
		height: 100%;
		background: url(<?php echo base_url() . 'images/Optimized-bondi.jpg'; ?>);
		background-size: cover;
		background-attachment: fixed;
	}
	#interest_box {
		height: auto;
		width: 400px;
		background-color: #000;
		background: rgba(0, 0, 0, 0.9);
		position:fixed;top:50%;left:50%;
		margin-top: -150px;
		margin-left: -200px;
		border-radius: 5px;
	}
</style>

<script>
	$(document).ready(function () {				
		$('#interest_btn').click(function () {
			document.getElementById('loader').style.display = 'block';
			setTimeout(function () {
				$.ajax({
					type	: 'POST',
					url		: '<?php echo site_url('launch/gauge_interest'); ?>',
					data	: $('#interest_form').serialize(),
					dataType: 'json',
					success	: function(data) {
						switch(data.response) {
							case 'empty_fields':
								document.getElementById('alert').innerHTML = 'Please enter your email address';
								document.getElementById('alert').style.display = 'block';
		                        $.each(data.result, function(k, v) {
		                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
		                        });
								break;
							case 'invalid_fields':
								document.getElementById('alert').innerHTML = 'Make sure your address is correct';
								document.getElementById('alert').style.display = 'block';
		                        $.each(data.result, function(k, v) {
		                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
		                        });
								break;
							case 'email_taken':
								$('#email_taken_notification').foundation('reveal', 'open');					
								break;
							case 'registered':
								$('#registered_notification').foundation('reveal', 'open');
								break;
							default:
								break;
						};
					},
					error	: function(data) {
						alert("Something went wrong!");
					}
				});
				document.getElementById('loader').style.display = 'none';			
			}, 500);
			return false;
		});
	});
</script>

<body>
	<div id="interest_row" class="row">		
		<div data-alert class="alert-box alert"  id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>				
		<div id="interest_box" class="large-5 large-centered columns">
			<h2 style="color: #FFF;">Get a life!</h2>
			<p style="color: #FFF; font-size:15px;">Express your interest!<br />
				We'll let you know when things really start to happen.</p>
			<hr></hr>
			<span style="color: #FFF;"><b>Email:</b></span><br /><br />
			<form id="interest_form">
				<input type="text" id="email" name="user_email" maxlenght="40" />
				<input type="submit" id="interest_btn" class="button success" value="I'm interested" />
				<img id="loader" style="display:none;" src='<?php echo base_url() . 'images/animators/loader.gif'; ?>' >
			</form>
		</div>	
	</div>
	
    <div id="registered_notification" class="reveal-modal" style="width: 600px; left: 50%; margin-left: -300px;">
      <h2>Mucha Gracias Amigo!</h2>
      <p>Thanks so much for registering your interest. We're nearly there, so hang tight, and we'll be sure to let you know when we take off. 
      	 <br /><br />Catch ya soon!</p>
      <a class="close-reveal-modal">&#215;</a>
    </div>
    
    <div id="email_taken_notification" class="reveal-modal" style="width: 600px; left: 50%; margin-left: -300px;">
      <h2>Woops!</h2>
      <p>Seems like this email is already taken. If you've already registered, thanks again! Remember, we'll keep you posted on our happenings! Stay tuned.</p>
      <a class="close-reveal-modal">&#215;</a>
    </div>    
    
    <?php include('application/views/common/foundation_js_dep.php'); ?>	
	
</body>
</html>
