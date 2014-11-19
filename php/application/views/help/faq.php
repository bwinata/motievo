<style type="text/css">
	#help_header {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;		
	}
	#help_options {
		position: relative;top: 10px;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	#help_panel_personal, #help_panel_dashboard {
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

<script>var selection = '<?php echo $help_page; ?>';</script>
<script src="<?php echo base_url() . 'js/help_tab_selection.js'; ?>"></script>

<body>
	<div id="help_header" class="row">
		<div class="large-12 columns">
			<h4 style="color: white;">Help</h4>
		</div>
	</div>
	<div id="help_options" class="row">
		<?php include ('help_tabs.php'); ?>
	</div>
	<div class="row">
		<div style="display: block;" id="help_panel_personal" class="large-12 columns container">
			<h4>FAQ</h4>
			<hr></hr>
			




		</div>	
	</div> 	

	<?php include('application/views/common/foundation_js_dep.php'); ?>	
</body>