<style type="text/css">
	#greeting {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	.nav_left, .nav_right {
		position: relative;top: 20px;
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
	}
	.photo_caption {
		font-size: 14px;
	}
	.inline_separator {
		width: 20px;
		height: 1px;
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
		$('#notification').show();
		
	});
</script>

<script>
	$(document).ready(function () {
		$('#').click(function () {
			$.ajax({
				method	: 'POST',
				url		: '<?php echo site_url('event/fetch_content'); ?>',
				type	: '&uid=',
				dataType: 'json',
				success	: function(data) {
					switch(data.response) {
						case 'fetch_okay':
							alert('fetch is okay');
							document.getElementById('all_happenings').innerHTML += data.result;
							break;
						default:
							break;
					}
				},
				error	: function(data) {
					alert('Something went wrong');
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
		<div id="all_happenings" class="nav_left large-7 columns" style="margin-left: -15px;">
			<div class="container">
				<h5><a href='#' style="color: black;">We're going bushwalking!</a></h5>
				<h6 class="subheader"><b>@ Lane Cove National Park</b></h6>
				<h6 class="subheader">with <a href='#'><b>Jessica Tan</b></a></h6>				
			</div>
		</div>		
		<div class="nav_right large-4 columns container" style="width: 400px;">
			<?php include('application/views/common/upcoming_happenings.php'); ?>
		</div>			
	</div>
	
	<div id="myModal" class="reveal-modal"></div>	
		
	<script>
	      document.write('<script src=' +
	      ('__proto__' in {} ? '<?php echo base_url() . 'js/vendor/zepto'; ?>' : '<?php echo base_url() . 'js/vendor/jquery'; ?>') +
	      '.js><\/script>')
	</script>
	
    <script src="<?php echo base_url() . 'js/fdn/foundation.js'; ?>"></script>  
    <script src="<?php echo base_url() . 'js/fdn/foundation.magellan.js'; ?>"></script>
    <script src="<?php echo base_url() . 'js/fdn/foundation.reveal.js'; ?>"></script>
	    
    <script>$(document).foundation();</script>

	
</body>