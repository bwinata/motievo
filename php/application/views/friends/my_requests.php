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
	.already_connected{
		width: 105px;
		height: 35px;
		background-color: #F00;
	}
</style>

<script>
	function allocate_requests(array) {
		$.each(array, function(k,v) {
				if (!$.isArray(v)) {
					document.getElementById(k).innerHTML += v;
				} else {
					document.getElementById(k).innerHTML += v;
				}
		});
	};
	
	$('body').on('click', '.connect', function(event) {
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/connect'); ?>',
			data	: '&my_uid=' + '<?php echo $this->input->cookie('_u_'); ?>' + '&friend_uid=' + $(this).attr('id'),
			dataType: 'json',
			success	: function(data) {
				switch(data.response)
				{
					case 'connected':
						document.getElementById('connect_status').innerHTML = '<h6 class="subheader"><b>Congratulations. You are now connected!<b></h6>';
						$('#connect_status').foundation('reveal', 'open', function () {location.reload();});
						break;
					case 'connected_error':
						alert('You cannot connect to this friend right now.');
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
	
	$(document).ready(function () {
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/get_requests'); ?>',
			data	: '&my_uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				switch(data.response)
				{
					case 'requests_available':
						allocate_requests(data.result);
						break;
					case 'requests_error':
						alert('There are no requests');
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
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="contacts_title" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">My Requests</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="received_requests" class="nav_left large-6 columns" style="margin-left: -15px;">
			<div class="container">
				<h5>Received</h5>				
			</div>		
		</div>
		<div id="sent_requests" class="nav_right large-6 columns" style="margin-right: -15px;">
			<div class="container">
				<h5>Sent</h5>
			</div>
		</div>			
	</div>
	
	<div id="connect_status" class="reveal-modal" style="width: 400px; left: 50%; margin-left: -200px; text-align: center;"></div>	
		
    <?php include('application/views/common/foundation_js_dep.php'); ?>	

</body>