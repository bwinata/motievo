<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/fdn/foundation.css'; ?>" />
<script src="<?php echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>
<script src="<?php echo base_url() . 'js/highlight_error_fields.js'; ?>"></script>
<script src="<?php echo base_url() . 'js/init_ajax_events.js'; ?>"></script>

<style type="text/css">
	a:hover {
		text-decoration: underline;
	}
	.inline_seperator {
		height: 1px;
		width: 10px;
	}
</style>	

<script>
	$(document).ready(function () {
		document.body.style.background = "url('<?php echo base_url() . 'images/Optimized-blurred_lines.jpg'; ?>')";
		document.body.style.backgroundSize = 'cover';
		document.body.style.backgroundAttachment = 'fixed';
		
		$('#search_friend_btn').click(function () {
			window.location = '<?php echo site_url('friends/find'); ?>'  + '?search=' + document.getElementById('search_friend').value;
			return false;
		});
		
		$.ajax({
			type	: 'GET',
			url		: '<?php echo site_url('dashboard/get_user_info'); ?>',
			data	: '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				document.getElementById('user').innerHTML = data.result['full_name'];
			},
			error	: function(data) {
				alert('Something went wrong');
			}
		});
	});
</script>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<title><?php echo $page_title; ?></title>
    
    <nav class="top-bar">
    	<ul class="title-area">
    		<li class="name">
    			<h1><a href="<?php echo base_url(); ?>">motievo</a></h1>
    		</li>
    	</ul>
    	<section class="top-bar-section">
    		<ul class="right">
    			<li class="name"><input type="text" id="search_friend" name="search_friend_name" placeholder="Username or Email" maxlength="40"></li>
    			<li class="name"><div class="inline_seperator"></div></li>    			
    			<li class="name"><form id="find_form"><input type="submit" style="border-radius: 2px;" id="search_friend_btn" class="small default button" value="Find a Friend" /></form></li>
    			<li class="name"><div class="inline_seperator"></div></li>
    			<li class="divider hide-for-small"></li>
    			<li class="name"><div class="inline_seperator"></div></li>
    			<li class="name"><a href="#" id="user" data-dropdown="drop1">Barry Winata<span data-dropdown="drop1"></span></a></li>
    			<li class="name"><div class="inline_seperator"></div></li>    			    			
    			<li class="divider hide-for-small"></li>
    			<li class="name"><a href="<?php echo site_url('dashboard/me'); ?>">Dashboard</a></li>
    			<li class="divider hide-for-small"></li>
    			<li class="name"><a href="<?php echo site_url('credentials/logout'); ?>">Logout</a></li>
    		</ul>
    	</section>
    </nav>
    
<ul id="drop1" class="f-dropdown" data-dropdown-content>
  <li><a href="<?php echo site_url('dashboard/conversations'); ?>">Conversations</a></li>
  <li><a href="<?php echo site_url('friends/requests'); ?>">Requests</a></li>
  <li><a href="<?php echo site_url('event/all'); ?>">Happenings</a></li>
  <li><a href="#">Friends</a></li>
  <li><a href="<?php echo site_url('settings/personal'); ?>">Settings</a></li>
</ul>    
</head>

