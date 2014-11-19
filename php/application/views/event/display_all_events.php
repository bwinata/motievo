<style type="text/css">
	#greeting {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	.nav_left{
		position: relative;top: 10px;
	}
	.nav_right {
		position: relative;top: -45px;
	}
	.other_party {
		font-size: 14px;
	}
	.title_upcoming:hover, .other_party:hover {
		text-decoration: underline;
		cursor: pointer;
	}
	.container {
		background: rgba(255, 255, 255, 0.90);
		border-radius: 5px;
		padding: 10px;
		margin-bottom: 10px;	
	}
	.photo_caption {
		font-size: 14px;
	}
	.inline_separator {
		width: 20px;
		height: 1px;
	}
	.comments_expand_btn:hover {
		color: #AAA;
		cursor: pointer;
	}
</style>

<style type="text/css">
	#notification {
		position: fixed;
		width: 230px;
		height: 200px;
		background: rgba(255, 255, 255, 0.80);
		border-radius: 5px;
	}
</style>

<script>
	$(document).ready(function () {
		
		/* AJAX - Initiate Events on page load*/
		var params = Array();
		var link = '<?php echo site_url('event/init_event_page'); ?>';
		params['e'] = '<?php echo $this->input->cookie('_e_'); ?>';
		params['u'] = '<?php echo $this->input->cookie('_u_'); ?>';
		
		AJAX_load_my_events(link, params);
		
		/* User Event Handlers */
		$('body').on('click', '.comments_expand_btn', function() {
			document.getElementById('loader').style.display = 'none';
			document.getElementById('comments_container').style.display = 'block';
			$.ajax({
				method	: 'GET',
				url		: '<?php echo site_url('event/fetch_messages'); ?>',
				data	: '&e_id=' + 'id',
				dataType: 'json',
				success	: function (data) {
					
				},
				error	: function (data) {
					
				}
			});
		});
	});
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">All Happenings</h3>
		</div>
	</div>
	<br />
	<div class="row">
		<div data-alert class="alert-box alert" id="alert" style="display: none;">
		  <a href="#" class="close">&times;</a>
		</div>
	</div>
	<div class="row">
		<div id="event_filter" class="nav_left large-7 columns" style="margin-left: -15px;">
			<div class="container large-12 columns">
				<ul style="list-style-type: none; margin: 0%;">
					<li style="display: inline; margin-right: 10%;"><b>Going</b></li>
					<li style="display: inline; margin-right: 10%;"><b>Sent</b></li>
					<li style="display: inline; margin-right: 10%;"><b>Received</b></li>
					<li style="display: inline; margin-right: 10%;"><b>Draft</b></li>
				</ul>
			</div>
		</div>
		<div id="all_happenings" class="nav_left large-7 columns" style="margin-left: -15px;"></div>		
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>

	<div id="event_created_notification" class="reveal-modal">
      <a class="close-reveal-modal">&#215;</a>		
	</div>	

	<?php include('application/views/common/foundation_js_dep.php'); ?>

</body>