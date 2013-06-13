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
	.friend_name {
		
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
	$(document).ready(function () {
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/search_friends'); ?>',
			data	: '&friend=' + '<?php echo $friend_name; ?>',
			dataType: 'json',
			success	: function(data) {
				
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
			<h3 style="color: white;">Find My Friends</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="my_happenings" class="nav_left large-7 columns" style="margin-left: -15px;">
			<div class="container">
				<div style="float: left; margin-right: 10px;" class="friend_profile_pic"><img src="<?php echo base_url() . 'images/default/default_profile.jpg'; ?>" /></div>
				<h5>Jessica Tan</h><br />
				<span style="font-size: 12px;">Hi there, Im using this app!</span>
				<input style="float: right;" type="submit" class="small success button" value="Connect" />
				<br /><br />	
			</div>					
		</div>
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="myModal" class="reveal-modal">
		
	</div>	
		
    <?php include('application/views/common/foundation_js_dep.php'); ?>	
	
</body>