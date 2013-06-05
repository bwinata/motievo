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
		<div id="settings_panel_dashboard" class="large-7 columns container">
			<h4>Dashboard</h4>
			<hr></hr>
			<form>
				<h6 class="subheader"><b>Wallpaper</b></h6>
				<div id="wallpaper">
					<img src="<?php echo base_url() . 'images/barry.winata@yahoo.com/the_rocks.jpg'; ?>" />
				</div><br />
				<input type="submit" class="small success button" id="wallpaper_btn" value="Change Wallpaper" />
				<hr></hr>				
			</form>				
		</div>	
	</div> 	
</body>