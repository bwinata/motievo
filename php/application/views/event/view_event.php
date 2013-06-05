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

<script>
	$(document).ready(function () {
		$('.img').click(function () {
			document.getElementById('myModal').innerHTML = "<img src=" + $(this).attr('id') + " " +  "/ >";
		});
	});
</script>

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>
<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">We're going Bushwalking!</h3>
		</div>
		<div class="large-4 columns">
    		<ul class="button-group right">
    			<li class="name"><h6 style="color: white; margin-top: 20px;">Created by <a href="#">Jessica Tan</a></h6></li>
    		</ul>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="nav_left large-7 columns" style="margin-left: -15px;">
			<div id="010613_1" class="container">
				<h5>June 20 2013</h5>
				<hr></hr>
				<h5>7:00 PM to 10:00 PM</h5>
				<hr></hr>				
				<h4 class="subheader">@ Surry Hills</h4>
				<iframe width="525" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				<hr></hr>
				<h5>Meeting Point:</h5>
				<p>Central Station - Eddy Avenue</p>
				<hr></hr>
				<h5>Details:</h5>
				<p class="event_details">
					This is a test event. Seems like we're going bushwalking. It's been a while, since any of us have done 
					anything like this. This should be fun and interesting. We'll start in Surry Hills and make our way to the edge
					of the city.
				</p>
				<hr></hr>
				<form>
					<input type="submit" id="going_btn" class="small default button" value="I'm Going" />
					<input type="submit" id="postpone_btn" class="small alert button" value="Can't Make it" />					
				</form>
				<br />
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