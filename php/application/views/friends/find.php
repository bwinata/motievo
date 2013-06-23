<style type="text/css">
	#contacts_title {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;		
	}
	.ul_friends {
		list-style-type: none;
		margin-left: -10px;
	}
	.friend_greeting {
		font-size: 13px;
	}
	.friend_profile_pic {
		height: 75px;
		width: 75px;
		background-color: black;
	}
	.container {
		background: rgba(255, 255, 255, 0.80);
		border-radius: 5px;
		padding: 10px;
		margin-bottom: 15px;
	}
	.friend_container {
		background: rgba(255, 255, 255, 0.80);
		border-radius: 5px;
		margin-left: -20px;
		margin-bottom: 10px;
		padding: 10px;
	}
</style>

<script>
	$(document).ready(function () {
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/search_friends'); ?>',
			data	: '&my_uid=' + '<?php echo $this->input->cookie('_u_'); ?>' + '&friend=' + '<?php echo $friend_name; ?>',
			dataType: 'json',
			success	: function(data) {
				document.getElementById('friend_finder').innerHTML += data.result;
			},
			error	: function(data) {
				alert('Something went wrong');
			}
		});
	
		$('body').on('click', '.connect', function (event) {
			var id = $(this).attr('id');
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('friends/make_friends'); ?>',
				data	: '&my_uid=' + '<?php echo $this->input->cookie('_u_'); ?>' + '&friend_uid=' + $(this).attr('id'),
				dataType: 'json',
				success	: function(data) {
					switch(data.response)
					{
						case 'request_sent':
							document.getElementById(id).style.backgroundColor = '#00F';
							document.getElementById(id).value = 'Request Sent';
							document.getElementById(id).disabled = 'true';
							document.getElementById('request_status').innerHTML = '<h6 class="subheader"><b>Your request has been sent!<b></h6>';
							$('#request_status').foundation('reveal', 'open');
							break;
						case 'request_error':
							alert('Friend could not be added');
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
	<div id="contacts_title" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">Find My Friends</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="friend_finder" class="nav_left large-7 columns" style="margin-left: -15px;"></div>
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="request_status" class="reveal-modal" style="width: 400px; left: 50%; margin-left: -200px; text-align: center;"></div>	
		
    <?php include('application/views/common/foundation_js_dep.php'); ?>	

</body>