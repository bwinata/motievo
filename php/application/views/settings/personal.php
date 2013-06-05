<style type="text/css">
	#settings_header {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;		
	}
	#settings_options {
		position: relative;top: 10px;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	#settings_panel_personal, #settings_panel_dashboard {
		float: left;
		position: relative;top: 25px;
	}
	#wallpaper {
		height: 300px;
		width: 400px;
		background-color: black;
	}
	#display_pic {
		height: 150px;
		width: 150px;
		background-color: black;
	}
	.label {
		background: rgba(255, 255, 255, 0.0);
	}
	.container {
		background: rgba(255, 255, 255, 0.90);
		border-radius: 5px;
		padding: 10px;	
	}
</style>

<script>var selection = '<?php echo $settings_page; ?>'</script>
<script src="<?php echo base_url() . 'js/settings_tab_selection.js'; ?>"></script>

<body>
	<div id="settings_header" class="row">
		<div class="large-12 columns">
			<h4 style="color: white;">My settings</h4>
		</div>
	</div>
	<div id="settings_options" class="row">
		<?php include('settings_tab.php'); ?>
	</div>
	<div class="row">
		<div id="settings_panel_personal" class="large-7 columns container">
			<h4>Personal</h4>
			<hr></hr>
			<form>
				<h6 class="subheader"><b>Display Picture</b></h6>
				<div style="margin-left: -15px;" class="large-4 columns">				
					<div id="display_pic"><img src="<?php echo base_url() . 'images/default/default_profile.jpg'; ?>" /></div>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="small default button" id="change_profile_pic_btn" value="Change Picture" />
				</div>
				<hr></hr>				
				<h6 class="subheader"><b>Full Name</b></h6>
				<input style="width:400px; border: solid;" type="text" id="full_name_settings" name="full_name_settings_name" value="Barry Winata" />
				<h6 class="subheader"><b>Username</b></h6>
				<input style="width:400px; border: solid;" type="text" id="username_settings" name="username_settings_name" value="bwinata" />				
				<hr></hr>
				<h6 class="subheader"><b>Email</b></h6>
				<input style="width:400px; border: solid;" type="text" id="email_settings" name="email_settings_name" value="barry.winata@yahoo.com" />
				<hr></hr>
				<h6 class="subheader"><b>Current Password</b></h6>
				<input style="width:200px; border: solid;" type="password" id="current_pw_settings" name="current_pw_name" value="Evolve729183" />
				<div style="margin-left: -15px;" class="large-5 columns">
					<h6 class="subheader"><b>New Password</b></h6>
					<input style="width:200px; border: solid;" type="password" id="new_pw_settings" name="new_pw_name" />
				</div>
				<div class="large-6 columns">
					<h6 class="subheader"><b>Re-type Password</b></h6>
					<input style="width:200px; border: solid;" type="password" id="re_pw_settings" name="re_pw_name" />
				</div>
				<hr></hr>				
				<input type="submit" class="small success button" id="update_details_btn" value="Update Details" />				
			</form>
		</div>		
	</div> 	
</body>