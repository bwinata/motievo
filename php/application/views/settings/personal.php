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

<script>
	$(document).ready(function () {
		$.ajax({
			method	: 'POST',
			url		: '<?php echo site_url('settings/fetch_data'); ?>',
			data	: '&setting=' + 'personal' + '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
			dataType: 'json',
			success	: function(data) {
				switch(data.response){
					case 'data_retrieved':
						document.getElementById('full_name_settings').value = data.result['full_name'];
						document.getElementById('username_settings').value = data.result['username'];
						document.getElementById('email_settings').value = data.result['email'];
						document.getElementById('about_me_settings').value = data.result['about_me'];
						break;
					default:
						break;
				}
			},
			error	: function(data) {
				alert('Something went wrong');
			}
		});
		
		$('#update_details_btn').click(function () {
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('settings/update_details'); ?>',
				data	: $('#personal_form').serialize() + '&setting=' + 'personal' + '&uid=' + '<?php echo $this->input->cookie('_u_'); ?>',
				dataType: 'json',
				success	: function(data) {
					switch(data.response){
						case 'empty_fields':
							document.getElementById('alert').innerHTML = 'Please make sure all fields have been filled in.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'invalid_fields':
							document.getElementById('alert').innerHTML = 'Make sure that each field has been correctly entered.';
							document.getElementById('alert').style.display = 'block';
	                        $.each(data.result, function(k, v) {
	                            document.getElementById(v).style.backgroundColor = '#F9B9BF';
	                        });
							break;
						case 'details_updated':
							alert(data.result);
							break;
						default:
							break;
					}
				},
				error	: function(data) {
					alert('Something went wrong');
				}
			});
			return false;
		});
	});
</script>



<body>
	<div id="settings_header" class="row">
		<div class="large-12 columns">
			<h4 style="color: white;">My settings</h4>
		</div>
	</div>
	<div id="settings_options" class="row">
		<?php include('settings_tab.php'); ?>
	</div>
	<br />
	<div class="row">
		<div data-alert class="alert-box alert"  id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>		
	</div>	
	<div class="row">
		<div id="settings_panel_personal" class="large-7 columns container">
			<h4>Personal</h4>
			<hr></hr>
			<form id="personal_form">
				<h6 class="subheader"><b>Display Picture</b></h6>
				<div style="margin-left: -15px;" class="large-4 columns">				
					<div id="display_pic"><img src="<?php echo base_url() . 'images/default/default_profile.jpg'; ?>" /></div>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="small default button" id="change_profile_pic_btn" value="Change Picture" />
				</div>
				<hr></hr>				
				<h6 class="subheader"><b>Full Name</b></h6>
				<input style="width:400px; border: solid;" type="text" id="full_name_settings" name="full_name_settings_name"/>
				<h6 class="subheader"><b>Username</b></h6>
				<input style="width:400px; border: solid;" type="text" id="username_settings" name="username_settings_name"/>				
				<hr></hr>
				<h6 class="subheader"><b>Email</b></h6>
				<input style="width:400px; border: solid;" type="text" id="email_settings" name="email_settings_name"/>
				<hr></hr>
				<h6 class="subheader"><b>Current Password</b></h6>
				<input style="width:200px; border: solid;" type="password" id="current_pw_settings" name="current_pw_settings_name"/>
				<div style="margin-left: -15px;" class="large-5 columns">
					<h6 class="subheader"><b>New Password</b></h6>
					<input style="width:200px; border: solid;" type="password" id="new_pw_settings" name="new_pw_settings_name" />
				</div>
				<div class="large-6 columns">
					<h6 class="subheader"><b>Re-type Password</b></h6>
					<input style="width:200px; border: solid;" type="password" id="re_pw_settings" name="re_pw_settings_name" />
				</div>
				<hr></hr>				
				<h6 class="subheader"><b>A one liner about me:</b></h6>
				<input style="width:400px; border: solid;" type="text" id="about_me_settings" name="about_me_settings_name" />
				<input type="submit" class="small success button" id="update_details_btn" value="Update Details" />				
			</form>
		</div>		
	</div> 	
</body>