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
	}
	.photo_caption {
		font-size: 14px;
	}
	.inline_separator {
		width: 20px;
		height: 1px;
	}
</style>

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
		$('#notification').show();
		
	});
</script>

<script>
	$(document).ready(function () {
		$('.img').click(function () {
			document.getElementById('myModal').innerHTML = "<img src=" + $(this).attr('id') + " " +  "/ >";
		});
		
		$('#event_submit_btn').click(function() {
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('event/create_event'); ?>',
				data	: $('#event_form').serialize(),
				dataType: 'json',
				success	: function(data) {
					switch(data.response)
					{
						case 'empty_fields':
							document.getElementById('alert').innerHTML = 'Please make sure all fields have been filled in.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });						
							break;
						case 'valid_fields':
							document.getElementById('alert').innerHTML = '';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });						
							break;
						case 'event_organised':
							alert(data.result);
							break;
						default:
							break;
					}
				},
				error	: function(data) {
					alert('Event could not be created');
				}
			});
			return false;
		});
		
	});
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">Organise a Happening</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div data-alert class="alert-box alert" id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>
	</div>
	<div class="row">
		<div class="nav_left large-7 columns" style="margin-left: -15px;">
			<div id="event_creation" class="container">
				<form id="event_form">
					<h5>Happening</h5>
					<input type="text" style="border: solid;" id="event_title" class="input_fields" name="event_title_name" placeholder="What are we calling this?" />
					<h5>Friend</h5>
					<input type="text" style="border: solid;" id="event_friend" class="input_fields" name="event_friend_name" placeholder="Type in a name" />
					<h5>Date</h5>
					<input type="text" style="border: solid;" id="event_date" class="input_fields" name="event_date_name" placeholder="What date is it on?" />
					<h5>Time</h5>
					<input type="text" style="border: solid;" id="event_time" class="input_fields" name="event_time_name" placeholder="When time is it on?" />		
					<h5>Location</h5>
					<input type="text" style="border: solid;" id="event_location" class="input_fields" name="event_location_name" placeholder="Where are we going?" />
					<h5>Meeting Point</h5>
					<input type="text" style="border: solid;" id="event_meeting_point" class="input_fields" name="event_meeting_point_name" placeholder="Where are we meeting?" />				
					<h5>Details</h5>
					<textarea id="event_description" class="input_fields" name="event_description_name" style="height: 250px; border: solid;" placeholder="What are we doing?"></textarea>
					<input type="submit" id="event_submit_btn" class="default button" name="event_submit_btn_name" value="Make it happen" />				
				</form>
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