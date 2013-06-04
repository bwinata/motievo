<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<title>Get a life!</title>
	
	<link rel="stylesheet" href="<?php echo base_url() . 'css/fdn/foundation.css'; ?>" />
    <script src="<?php echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>
</head>

<style type="text/css">
	body {
		height: 100%;
		background: url(<?php echo base_url() . 'images/blurred_lines.jpg'; ?>);
		background-size: cover;
	}
	#interest_box {
		height: 300px;
		width: 400px;
		background-color: #000;
		background: rgba(0, 0, 0, 0.9);
		position:fixed;top:50%;left:50%;
		margin-top: -150px;
		margin-left: -200px;
		border-radius: 5px;
	}
</style>

<body>
	<div id="interest_row" class="row">			
		<div id="interest_box" class="large-5 large-centered columns">
			<h2 style="color: #FFF;">Get a life!</h2>
			<p style="color: #FFF; font-size:15px;">Express your interest!<br />
									We'll let you know when things really start to happen.</p>
			<hr></hr>
			<span style="color: #FFF;"><b>Email:</b></span><br /><br />
			<form>
				<input type="text" id="email" name="user_email" maxlenght="40" />
				<input type="submit" class="button success" value="I'm interested" />
			</form>
		</div>
	</div>
</body>

</html>
