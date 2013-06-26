<style type="text/css">
	#greeting, #preview_event_heading {
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

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="<?php echo base_url() . 'js/google_location_finder.js'; ?>"></script>

<script>
	$(document).ready(function () {
		generate_maps('map_container');
		
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/fetch_friends_list'); ?>',
			data	: '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				 $(function() {
					var friendTags = data.result;
					$( "#event_friend" ).autocomplete({
						source: friendTags
					});
				});
			},
			error	: function(data) {
			}
		});
		
		$('#event_preview_btn').click(function () {
			var values = {};
			var fields = $('#event_form :input');
			fields.each(function () {
				values[this.name]  = $(this).val();
			});
			
			switch ($(this).attr('value')) {
				case 'Preview':
					document.getElementById('loader').style.display = 'block';
					document.getElementById('event_preview_btn').value = 'Creating Preview ...';
					setTimeout(function () {
						document.getElementById('event_form').style.display = 'none';
						document.getElementById('preview_event_heading').style.display = 'block';
						
						document.getElementById('preview_title').innerHTML = values['event_title_name'];
						document.getElementById('preview_friend').innerHTML = 'with ' + values['event_friend_name'];
						document.getElementById('preview_date').innerHTML = values['event_date_name'];
						document.getElementById('preview_time').innerHTML = values['event_time_name'];
						document.getElementById('preview_location').innerHTML = values['event_location_name'];
						document.getElementById('preview_meeting_point').innerHTML = values['event_meeting_point_name'];
						document.getElementById('preview_details').innerHTML = values['event_description_name'];
						document.getElementById('preview_event').style.display = 'block';
						
						document.getElementById('event_preview_btn').value = 'Edit';
						document.getElementById('loader').style.display = 'none';
						$('body, html').animate({
							scrollTop: 0
						}, 800);				
					}, 1500);				
					break;
				case 'Edit':
					document.getElementById('loader').style.display = 'block';
					setTimeout(function () {
						document.getElementById('preview_event').style.display = 'none';
						document.getElementById('preview_event_heading').style.display = 'none';
						document.getElementById('event_form').style.display = 'block';
						document.getElementById('event_preview_btn').value = 'Preview';
						document.getElementById('loader').style.display = 'none';
						$('body, html').animate({
							scrollTop: 0
						}, 800);				
					}, 1500);	
					break;
			}
		});
		
		$('#event_submit_btn').click(function() {
			document.getElementById('loader').style.display = 'block';
			document.getElementById('event_submit_btn').value = 'Creating ...';
			setTimeout(function () {
				$.ajax({
					method	: 'POST',
					url		: '<?php echo site_url('event/create_event'); ?>',
					data	: $('#event_form').serialize() + '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
					dataType: 'json',
					success	: function(data) {
						switch(data.response)
						{
							case 'empty_fields':
								document.getElementById('alert').innerHTML = 'Please make sure all fields have been filled in.';
								highlight_error_fields(data.result);
								break;
							case 'invalid_fields':
								document.getElementById('alert').innerHTML = 'Please make sure all fields are correct.';
								highlight_error_fields(data.result);
								break;
							case 'event_organised':
								$('#event_created_notification').foundation('reveal', 'open');
								break;
							case 'event_error':
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
				document.getElementById('loader').style.display = 'none';
				document.getElementById('event_submit_btn').value = 'Make it happen';
			}, 1000);
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
	<div id="preview_event_heading" class="row" style="display: none; margin-top: 10px;">
		<div class="large-7 columns">
			<h3 id="preview_title" style="color: white;"></h3>
			<h6 id="preview_friend" style="color: white; margin-top: -10px;"></h6>
		</div>
		<div class="large-4 columns">
    		<ul class="button-group right">
    			<li class="name"><h6 style="color: white; margin-top: 40px;">Created by <a href="#">Barry Winata</a></h6></li>
    		</ul>
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
				<form id="event_form" style="display: block;">
					<h5>Happening</h5>
					<input type="text" style="border: solid;" id="event_title" class="input_fields" name="event_title_name" placeholder="What are we calling this?" />
					<h5>Friend</h5>
					<input type="text" style="border: solid;" id="event_friend" class="input_fields" name="event_friend_name" placeholder="With who? Full name or Username" />
					<h5>Date</h5>
					<input type="text" style="border: solid;" id="event_date" class="input_fields" name="event_date_name" placeholder="What date is it on?" />
					<h5>Time</h5>
					<input type="text" style="border: solid;" id="event_time" class="input_fields" name="event_time_name" placeholder="What time is it on?" />		
					<h5>Location</h5>
					<input type="text" style="border: solid;" id="event_location" class="input_fields" name="event_location_name" placeholder="Where are we going?" />
					<div id="map_container" style="width: 100%; height: 375px; background: black;"></div>
					<h5>Meeting Point</h5>
					<input type="text" style="border: solid;" id="event_meeting_point" class="input_fields" name="event_meeting_point_name" placeholder="Where are we meeting?" />				
					<h5>Details</h5>
					<textarea id="event_description" class="input_fields" name="event_description_name" style="height: 100px; border: solid;" placeholder="What are we doing?"></textarea>	
				</form>
				<div id="preview_event" style="display: none;">
					<h5 id="preview_date"></h5>
					<hr></hr>
					<h5 id="preview_time"></h5>
					<hr></hr>				
					<h4 id="preview_location" class="subheader"></h4>
					<div id="preview_map_container" style="width: 100%; height: 375px; background: black;"></div>
					<hr></hr>
					<h5>Meeting Point:</h5>
					<p id="preview_meeting_point"></p>
					<hr></hr>
					<h5>Details:</h5>
					<p id="preview_details" class="event_details"></p>
					<hr></hr>
				</div>
				<input type="submit" id="event_submit_btn" class="default small button" name="event_submit_btn_name" value="Make it happen" />
				<input type="submit" id="event_preview_btn" class="default small success button" name="event_preview_btn_name" value="Preview" />			
				<img id="loader" style="display:none;" src='<?php echo base_url() . 'images/animators/loader-white.gif'; ?>' >							
			</div>				
		</div>
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="event_created_notification" class="reveal-modal">
      <h2>Awesome!</h2>
      <p>Congratulations. You have successfully created an event.</p>
      <a class="close-reveal-modal">&#215;</a>		
	</div>	
		
    <?php include('application/views/common/foundation_js_dep.php'); ?>		
</body>