<style type="text/css">
	#event_heading {
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	#event_creation, #upcoming_happenings {
		postion: relative;top: 25px;
	}
	.container {
		background: rgba(255, 255, 255, 0.90);
		border-radius: 5px;
		padding: 10px;
	}
	.input_fields {
		border: solid;
	}
</style>


<script>
	$(document).ready(function () {
		$('#event_date').datepicker();
	});
</script>

<body>
	<div id="event_heading" class="row">
		<div class="large-12 columns">
			<h3 style="color: white;">Organize a happening</h3>
		</div>
	</div>
	<div class="row">
		<div id="event_creation" class="large-7 columns container">
			<form>
				<h5>Happening</h5>
				<input type="text" id="event_title" class="input_fields" name="event_title_name" placeholder="What are we calling this?" />
				<h5>Friend</h5>
				<input type="text" id="event_friend" class="input_fields" name="event_friend_name" placeholder="Type in a name" />
				<h5>Date</h5>
				<input type="text" id="event_date" class="input_fields" name="event_date_time" placeholder="What date is it on?" />
				<h5>Time</h5>
				<input type="text" id="event_time" class="input_fields" name="event_time_name" placeholder="When time is it on?" />		
				<h5>Location</h5>
				<input type="text" id="event_location" class="input_fields" name="event_location_name" placeholder="Where are we going?" />
				<h5>Meeting Point</h5>
				<input type="text" id="event_meeting_point" class="input_fields" name="event_meeting_point_name" placeholder="Where are we meeting?" />				
				<h5>Details</h5>
				<textarea id="event_description" class="input_fields" name="event_description_name" style="height: 250px;" placeholder="What are we doing?"></textarea>
				<input type="submit" id="event_submit_btn" class="default button" name="event_submit_btn_name" value="Make it happen" />				
			</form>
		</div>
		<div id="upcoming_happenings" class="large-4 columns container">
			<h5>Upcoming Happenings</h5>
			<hr></hr>
			<h6 class="title_upcoming">Having dinner with Jess</h6>
			<span>with </span><span class="other_party"><b>Jessica Tan</b></span><br /><br />
			<span style="font-size:14px;">6 June 2013</span>
			<h6 class="subheader">Darling Harbour</h6>
			<hr></hr>
		</div>	
	</div>
</body>