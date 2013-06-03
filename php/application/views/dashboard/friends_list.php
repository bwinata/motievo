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
	}
</style>


<body>
	<div id="contacts_title" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">My Friends</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="contact_list" class="large-7 columns container">
			<ul class="ul_friends">
				<li class="li_friend">
					<div class="large-2 columns">
						<div class="friend_profile_pic"></div>
					</div>
					<div class="large-10 columns">
						<span class="friend_name"><a href="#"><b>Jessica Tan</b></a></span><br />
						<span class="friend_greeting">This is a test greeting</span>						
					</div>
				</li>
				<hr></hr>
				<li class="li_friend">
					<div class="large-2 columns">
						<div class="friend_profile_pic"></div>
					</div>
					<div class="large-10 columns">
						<span class="friend_name"><b>Jessica Tan</b></span><br />
						<span class="friend_greeting">This is a test greeting</span>						
					</div>
				</li>
				<hr></hr>	
				<li class="li_friend">
					<div class="large-2 columns">
						<div class="friend_profile_pic"></div>
					</div>
					<div class="large-10 columns">
						<span class="friend_name"><b>Jessica Tan</b></span><br />
						<span class="friend_greeting">This is a test greeting</span>						
					</div>
				</li>								
			</ul>			
		</div>
		<div id="upcoming_happenings" class="large-4 columns container" style="width: 400px;">
			<h4>Upcoming Happenings</h4>
			<hr></hr>
			<span style="font-size:14px;">6 June 2013</span>
			<h6 class="title_upcoming">Having dinner with Jess</h6>
			<span>with </span><span class="other_party"><b>Jessica Tan</b></span><br /><br />
			<h6 class="subheader">Darling Harbour</h6>
			<hr></hr>
		</div>			
	</div>
	
	<div id="myModal" class="reveal-modal">
		
	</div>	
		
	<script>
	      document.write('<script src=' +
	      ('__proto__' in {} ? '<?php echo base_url() . 'js/vendor/zepto'; ?>' : '<?php echo base_url() . 'js/vendor/jquery'; ?>') +
	      '.js><\/script>')
	</script>
	
    <script src="<?php echo base_url() . 'js/fdn/foundation.js'; ?>"></script>  
    <script src="<?php echo base_url() . 'js/fdn/foundation.magellan.js'; ?>"></script>
    <script src="<?php echo base_url() . 'js/fdn/foundation.reveal.js'; ?>"></script>
	    
    <script>
        $(document).foundation();
    </script>	
	
</body>