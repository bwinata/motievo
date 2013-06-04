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


<body>
	<div id="contacts_title" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">Find My Friends</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="large-7 columns">
			<ul class="ul_friends large-12 columns">
				<li class="friend_container large-12 columns">
					<div class="large-2 columns"><div class="friend_profile_pic"></div></div>
					<div class="large-7 columns">
						<div class="friend_name">
							<span><a href="#"><b>Jessica Tan</b></a></span>
						</div>
						<div class="friend_greeting">
							<p>Hello, I'm, using this app!</p>
						</div>						
					</div>
					<div class="large-3 columns">
						<input type="submit" class="already_connected" value="Already Friends"
					</div>
				</li>
				<li class="friend_container large-12 columns">
					<div class="large-2 columns"><div class="friend_profile_pic"></div></div>
					<div class="large-7 columns">
						<div class="friend_name">
							<span><a href="#"><b>Jessica Tan</b></a></span>
						</div>
						<div class="friend_greeting">
							<p>Hello, I'm, using this app!</p>
						</div>						
					</div>
					<div class="large-3 columns">
						<input type="submit" class="small success button" value="Connect"
					</div>
				</li>																			
			</ul>
		</div>
		<div id="upcoming_happenings" class="large-4 columns container" style="width: 400px;">
			<h5>Upcoming Happenings</h5>
			<hr></hr>
			<span style="font-size:12px;"><b>6 June 2013</b></span><br /><br />
			<span style="font-size: 15px;" class="title_upcoming">Having dinner</span>
			<span>with </span><span class="other_party"><b>Jessica Tan</b></span><br />
			<h6 class="subheader"><b>@ Darling Harbour</b></h6>
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