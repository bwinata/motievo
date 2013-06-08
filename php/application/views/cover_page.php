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
		background: url(<?php echo base_url() . 'images/blurred_lines.jpg'; ?>);
		background-size: cover;
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
			$.ajax({
				type	: 'POST',
				url		: '<?php echo site_url('launch/gauge_interest'); ?>',
				data	: $('#interest_form').serialize(),
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'empty_fields':
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });							
							alert('Fields are empty');
							break;
						case 'invalid_fields':
							alert('Fields are invalid');
						case 'registered':
							alert(data.result);
							break;
						default:
							alert('Everything is okay');
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

<body>
	<div id="interest_row" class="row">			
		<div id="interest_box" class="large-5 large-centered columns">
			<h2 style="color: #FFF;">Get a life!</h2>
			<p style="color: #FFF; font-size:15px;">Express your interest!<br />
				We'll let you know when things really start to happen.</p>
			<hr></hr>
			<span style="color: #FFF;"><b>Email:</b></span><br /><br />
			<form id="interest_form">
				<input type="text" id="email" name="user_email" maxlenght="40" />
				<input type="submit" id="interest_btn" class="button success" value="I'm interested" />
			</form>
		</div>
	</div>
</body>

</html>
