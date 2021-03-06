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
		background: rgba(255, 255, 255, 0.90);
		border-radius: 5px;
		padding: 10px;
	}
	.friend_container {
		background: rgba(255, 255, 255, 0.90);
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

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="contacts_title" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">Friends</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="large-7 columns">
			<ul class="ul_friends large-12 columns">
				<li class="friend_container large-12 columns">
					<div class="large-2 columns"><div class="friend_profile_pic"><img src="<?php echo base_url() . 'images/default/default_profile.jpg'; ?>" /></div></div>
					<div class="large-10 columns">
						<div class="friend_name">
							<span><a href="#"><b>Jessica Tan</b></a></span>
						</div>
						<div class="friend_greeting">
							<p>Hello, I'm, using this app!</p>
						</div>						
					</div>
				</li>																			
			</ul>
		</div>
		<div id="upcoming_happenings" class="large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="myModal" class="reveal-modal">
		
	</div>	
		
	<?php include('application/views/common/foundation_js_dep.php'); ?>
	
</body>