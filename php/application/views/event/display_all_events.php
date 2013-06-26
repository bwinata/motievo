<style type="text/css">
	#greeting {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	.nav_left, .nav_right {
		position: relative;top: 20px;
	}
	.other_party {
		font-size: 14px;
	}
	.title_upcoming:hover, .other_party:hover {
		text-decoration: underline;
		cursor: pointer;
	}
	.container {
		background: rgba(255, 255, 255, 0.90);
		border-radius: 5px;
		padding: 10px;
		margin-bottom: 10px;	
	}
	.photo_caption {
		font-size: 14px;
	}
	.inline_separator {
		width: 20px;
		height: 1px;
	}
	.comments_expand_btn:hover {
		color: #AAA;
		cursor: pointer;
	}
</style>1

<style type="text/css">
	#notification {
		position: fixed;
		width: 230px;
		height: 200px;
		background: rgba(255, 255, 255, 0.80);
		border-radius: 5px;
	}
</style>

<script>
	$(document).ready(function () {
		$('body').on('click', '.comments_expand_btn', function() {
			document.getElementById('loader').style.display = 'none';
			document.getElementById('comments_container').style.display = 'block';
			$.ajax({
				method	: 'GET',
				url		: '<?php echo site_url('event/fetch_messages'); ?>',
				type	: '$e_id=' + 'id',
				dataType: 'json',
				success	: function (data) {
					
				},
				error	: function (data) {
					
				}
			});
		});
		
		$('#').click(function () {
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('event/fetch_content'); ?>',
				type	: '&uid=',
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'fetch_okay':
							alert('fetch is okay');
							document.getElementById('all_happenings').innerHTML += data.result;
							break;
						default:
							break;
					}
				},
				error	: function(data) {
					alert('Something went wrong');
				}
			});
		});
	});
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">All Happenings</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div data-alert class="alert-box alert" id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>
	</div>
	<div class="row">
		<div id="all_happenings" class="nav_left large-7 columns" style="margin-left: -15px;">
			<div class="container large-12 columns">
				<div class="large-7 columns" style="margin-left: -15px;">
					<h6><a href='#' style="color: black;">We're going bushwalking!</a></h6>
					<span class="subheader" style="margin-top: -10px; font-size: 14px;"><b>@ Lane Cove National Park</b></span><br />
					<span style="font-size: 13px;">with </span><span class="subheader"><a href='#'><b>Jessica Tan</b></a></span><br />				
				</div>			
				<div class="large-5 columns" style="margin-top: 20px; margin-left: 15px;">
					<input type="submit" class="tiny default button" style="font-size: 12px;" value="Send">
					<input type="submit" class="tiny default success button" style="font-size: 12px;" value="Edit">
					<input type="submit" class="tiny default alert button" style="font-size: 12px;" value="Delete">
				</div>
				<hr style="margin-bottom: 0px;"></hr>
				<img id="loader" style="display:none; margin-left: 47%;" src='<?php echo base_url() . 'images/animators/loader-white.gif'; ?>' >											
				<div id="comments_container" style="margin-top: 10px; display: none;">
					<div class="message" style="margin-left: -15px;">
						<div class="large-1 columns"><div class="comment_profile_pic" style="width: 40px; height: 40px; background: black;"></div></div>
						<div class="large-11 columns"><p class="message_text" style="font-size: 12px; margin-bottom: -0px;"><b>Jessica Tan</b></p></div>
						<div class="large-11 columns"><p class="message_text" style="font-size: 13px;">This is a test message</div>
						<br />
					</div>
					<hr style="margin-bottom: 5px;"></hr>
					<div class="message" style="margin-left: -15px;">
						<div class="large-1 columns"><div class="comment_profile_pic" style="width: 40px; height: 40px; background: black;"></div></div>
						<div class="large-11 columns"><p class="message_text" style="font-size: 12px; margin-bottom: -0px;"><b>Barry Winata</b></p></div>
						<div class="large-11 columns"><p class="message_text" style="font-size: 13px;">This is a test message</div>
					</div>					
					<hr></hr>
					<input type="text" class="comment_input_field" name="comment_input_field_name" placeholder="Type a quick message">
					<input type="submit" style="float: right;" class="tiny default button" value="Send"> 
				</div>
				<span class="comments_expand_btn" style="font-size: 11px; margin-left: 42%;">Quick Messages</span>					
			</div>			
		</div>		
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="myModal" class="reveal-modal"></div>	
		
	<script>
	      document.write('<script src=' +
	      ('__proto__' in {} ? '<?php echo base_url() . 'js/vendor/zepto'; ?>' : '<?php echo base_url() . 'js/vendor/jquery'; ?>') +
	      '.js><\/script>')
	</script>
	
    <script src="<?php echo base_url() . 'js/fdn/foundation.js'; ?>"></script>  
    <script src="<?php echo base_url() . 'js/fdn/foundation.magellan.js'; ?>"></script>
    <script src="<?php echo base_url() . 'js/fdn/foundation.reveal.js'; ?>"></script>
	    
    <script>$(document).foundation();</script>

	
</body>