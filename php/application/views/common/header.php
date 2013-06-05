<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/fdn/foundation.css'; ?>" />
<script src="<?php echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>

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
		document.body.style.background = "url('<?php echo base_url() . 'images/blurred_lines.jpg'; ?>')";
		document.body.style.backgroundSize = 'cover';
		document.body.style.backgroundAttachment = 'fixed';
	});
</script>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<title><?php echo $page_title; ?></title>
    
    <nav class="top-bar">
    	<ul class="title-area">
    		<li class="name">
    			<h1><a href="<?php echo base_url(); ?>">SocialOut</a></h1>
    		</li>
    	</ul>
    	<section class="top-bar-section">
    		<ul class="right">
    			<li class="name"><input type="text" id="search_friend" name="search_friend_name" placeholder="Username or Email" maxlength="40"></li>
    			<li class="name"><div class="inline_seperator"></div></li>    			
    			<li class="name"><input type="submit" id="search_friend_btn" class="small default button" value="Find a Friend" /></li>
    			<li class="name"><div class="inline_seperator"></div></li>    			    			
    			<li class="divider hide-for-small"></li>
    			<li class="name"><a href="<?php echo site_url('dashboard/me'); ?>">Dashboard</a></li>
    			<li class="divider hide-for-small"></li>
    			<li class="name"><a href="<?php echo site_url('settings/personal'); ?>">Settings</a></li>
    			<li class="divider hide-for-small"></li>
    			<li class="name"><a href="#">Logout</a></li>
    		</ul>
    	</section>
    </nav>
</head>
