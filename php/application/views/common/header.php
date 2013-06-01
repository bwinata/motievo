<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
<style type="text/css">
	a:hover {
		text-decoration: underline;
	}
</style>	

<script>
	$(document).ready(function () {
		document.body.style.background = "url('<? echo base_url() . 'images/bondi.jpg'; ?>')";
		document.body.style.backgroundSize = 'cover';
		document.body.style.backgroundAttachment = 'fixed';
	});
</script>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<title><?php echo $page_title; ?></title>

	<link rel="stylesheet" href="<? echo base_url() . 'css/fdn/foundation.css'; ?>" />
    <script src="<? echo base_url() . 'js/vendor/custom.modernizr.js'; ?>"></script>
    
    <nav class="top-bar">
    	<ul class="title-area">
    		<li class="name">
    			<h1><a href="<?php echo base_url(); ?>">SocialOut</a></h1>
    		</li>
    	</ul>
    	<section class="top-bar-section">
    		<ul class="right">
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
