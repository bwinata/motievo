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
	function display_content(content) {
		document.getElementById('my_happenings').innerHTML += content['my_happenings'];	
	}

	$(document).ready(function () {
		$('#notification').show();
		
		$.ajax({
			type	: 'POST',
			url		: '<?php echo site_url('dashboard/get_user_info'); ?>',
			data	: '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				switch(data.response) {
					case 'data_retrieved':
						display_content(data.result);
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

<script>
	$(document).ready(function () {
		$('.img').click(function () {
			document.getElementById('myModal').innerHTML = "<img src=" + $(this).attr('id') + " " +  "/ >";
		});
		
		$('#create_new_msg').click(function () {
			$('#new_message_container').foundation('reveal', 'open');			
		});
		
		$('#new_convo_btn').click(function () {
			document.getElementById('loader').style.display = 'block';
		});
		
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('friends/fetch_friends_list'); ?>',
			data	: '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				 $(function() {
					var friendTags = data.result;
					$( "#message_friend_field" ).autocomplete({
						source: friendTags
					});
				});
			},
			error	: function(data) {
			}
		});		
		
	});
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 id="main_full_name" style="color: white;">My Conversations</h3>
		</div>
		<div class="large-4 columns">
    		<ul class="button-group right">
    			<li class="name"><div class="inline_separator"></div></li>
    			<li class="name"><h5><a href="#" id="create_new_msg" style="color: white;" >+ Create New</a></h5></li>
    		</ul>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="my_happenings" class="nav_left large-7 columns" style="margin-left: -15px;">
		</div>
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
    <div id="new_message_container" class="reveal-modal" style="width: 600px; left: 50%; margin-left: -300px;">
      <h5>New Conversation</h5>
      <input type="text" id="message_friend_field" name="message_friend_field_name" placeholder="Enter friend's name">
      <textarea id="new_convo_textarea" style="height: 100px;" placeholder="New message..."></textarea>
      <input type="submit" id="new_convo_btn" class="tiny default button" style="float: left; margin-right: 10px;" value="Send">
      <img id="loader" style="display:none;" src='<?php echo base_url() . 'images/animators/loader-white.gif'; ?>' >
      <a class="close-reveal-modal">&#215;</a>
    </div>	
	
	
	<?php include('application/views/common/foundation_js_dep.php'); ?>
</body>