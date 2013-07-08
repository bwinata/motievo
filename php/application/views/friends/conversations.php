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
	.messages_expand_btn:hover {
		color: #AAA;
		cursor: pointer;
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
	function display_content(id, content) {
		$.each(content, function(k,v){
			document.getElementById(id).innerHTML += v;
		});
	}

	$(document).ready(function () {
		$('.img').click(function () {
			document.getElementById('myModal').innerHTML = "<img src=" + $(this).attr('id') + " " +  "/ >";
		});
		
		$('#create_new_msg').click(function () {
			$('#new_message_container').foundation('reveal', 'open');
		});
		
		$('body').on('click', '.messages_expand_btn', function (event) {
			var container_id = $(this).parent().attr('id');
			var message_container_id = 'message_container_' + container_id; 
			if (document.getElementById(message_container_id).style.display == 'none') {
				document.getElementById('loader_' + container_id).style.display = 'block';
				$.ajax({
					method	: 'GET',
					url		: '<?php echo site_url('dashboard/fetch_convo_messages'); ?>',
					data	: '&c_id=' + $(this).parent().attr('id'),
					dataType: 'json',
					success	: function(data) {
						display_content(message_container_id, data.result);
						document.getElementById(message_container_id).style.display = 'block';
						
					},
					error	: function(data) {
						alert('Something went wrong');
					}
				});
				document.getElementById('loader_' + container_id).style.display = 'none';
				return false;
			} else {
				document.getElementById(message_container_id).style.display = 'none';
				document.getElementById(message_container_id).innerHTML = '';
			}
		});
		
		$('body').on('click', '.send_msg_btn', function (event) {
			/* Get grandfather id */
			var send_msg_id = 'send_msg_id_' + $(this).parents().eq(1).attr('id');
			var text = document.getElementById(send_msg_id).value;
			
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('dashboard/post_message'); ?>',
				data	: '&c_id=' + $(this).parents().eq(1).attr('id'),
				dataType: 'json',
				success	: function(data) {
					
				},
				error	: function(data) {
					alert('Something went wrong');
				}
			});
			
		});
		
		$('#new_convo_btn').click(function () {
			document.getElementById('loader').style.display = 'block';
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('dashboard/post_conversation'); ?>',
				data	: $('#new_convo_form').serialize() + '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'slot_opened':
							location.reload();
							break;
						case 'friend_error':
						case 'slot_taken':
							alert(data.result);
							break;
					}
				},
				error	: function(data) {
					alert('Something went wrong');
				}
			});
			document.getElementById('loader').style.display = 'none';
			return false;
		});
		
		$.ajax({
			method	: 'GET',
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
		
		$.ajax({
			type	: 'GET',
			url		: '<?php echo site_url('dashboard/fetch_conversation'); ?>',
			data	: '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				switch(data.response) {
					case 'retrieved':
						display_content('my_conversations', data.result);
						break;
					case 'no_convos':
						document.getElementById('my_conversations').innerHTML += data.result;
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
		<div id="my_conversations" class="nav_left large-7 columns" style="margin-left: -15px;"></div>		
		<div class="nav_right large-4 columns container" style="width: 400px;"><?php include('application/views/common/upcoming_happenings.php'); ?></div>			
	</div>
    <div id="new_message_container" class="reveal-modal" style="width: 600px; left: 50%; margin-left: -300px;">
      <h5>New Conversation</h5>
      <form id="new_convo_form">
			<input type="text" id="message_friend_field" name="message_friend_field_name" placeholder="Enter friend's name">
      		<textarea id="new_convo_textarea" name="new_convo_textarea_name" style="height: 100px;" placeholder="New message..."></textarea>	
      </form>
      <input type="submit" id="new_convo_btn" class="tiny default button" style="float: left; margin-right: 10px;" value="Send">
      <img id="loader" style="display:none;" src='<?php echo base_url() . 'images/animators/loader-white.gif'; ?>' >
      <a class="close-reveal-modal">&#215;</a>
    </div>	
	
	
	<?php include('application/views/common/foundation_js_dep.php'); ?>
</body>