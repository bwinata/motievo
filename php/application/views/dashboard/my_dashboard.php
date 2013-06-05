<style type="text/css">
	#greeting {
		position: relative;
		background: rgba(0, 0, 0, 0.60);
		border-radius: 5px;
	}
	#past_happenings, #upcoming_happenings {
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

<link rel="stylesheet" href="<?php echo base_url() . 'css/scroll_top.css'; ?>" />
<script src="<?php echo base_url() . 'js/scroll_top.js'; ?>"></script>

<script>
	$(document).ready(function () {
		$('.img').click(function () {
			document.getElementById('myModal').innerHTML = "<img src=" + $(this).attr('id') + " " +  "/ >";
		});
	});
</script>

<p id="back-top"><a href="#top"><span></span></a></p>

<body>
	<div id="greeting" class="row">
		<div class="large-7 columns">
			<h3 style="color: white;">Barry Winata</h3>
		</div>
		<div class="large-4 columns">
    		<ul class="button-group right">
    			<li class="name"><h3><a href="<?php echo site_url('dashboard/contacts'); ?>" style="color: white;" >Friends</a></h3></li>
    			<li class="name"><div class="inline_separator"></div></li>    			
    			<li class="name"><h3 style="color: white;">|</h3></li>    				
    			<li class="name"><div class="inline_separator"></div></li>
    			<li class="name"><h3><a href="<?php echo site_url('event/organize'); ?>" style="color: white;" >Create</a></h3></li>
    		</ul>
		</div>
	</div>
	<br />
	<div class="row">
		<div id="past_happenings" class="large-7 columns" style="margin-left: -15px;">
			<div class="container">
				<h5>My Happenings</h5>
			</div>
			<br />
			<div id="010613_1" class="container">
				<h5>Lunch with a mate</h5>
				<span style="font-size: 14px;"><b>1 June 2013</b></span><br /><br />
				<h6 class="subheader">@ Surry Hills</h6>
				<iframe width="525" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				<hr></hr>
				<a href="#" class="img" id="<?php echo base_url() . 'images/barry.winata@yahoo.com/the_rocks.jpg'; ?>" data-reveal-id="myModal"><img src="<?php echo base_url() . 'images/barry.winata@yahoo.com/the_rocks.jpg'; ?>" /></a>
				<span class="photo_caption">Checking out the sights</span>
				<hr></hr>
				<p class="my_posts">
					Not too sure what I'm doing here, but I love it. Can't wait to see what happens next.
				</p>
				<hr></hr>
				<br /><br />
			</div>
			<br /><br /><br />
			<div id="010613_2" class="container">
				<h5>Dinner with a mate</h5>
				<span style="font-size: 14px;"><b>1 June 2013</b></span><br /><br />
				<h6 class="subheader">@ Surry Hills</h6>
				<iframe width="525" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=surry+hills,sydney&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.547176,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Surry+Hills+New+South+Wales,+Australia&amp;ll=-33.890647,151.212925&amp;spn=0.036408,0.077162&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				<hr></hr>
				<a href="#" class="img" id="<?php echo base_url() . 'images/barry.winata@yahoo.com/the_rocks.jpg'; ?>" data-reveal-id="myModal"><img src="<?php echo base_url() . 'images/barry.winata@yahoo.com/the_rocks.jpg'; ?>" /></a>
				<span class="photo_caption">Checking out the sights</span>
				<hr></hr>
				<p class="my_posts">
					Not too sure what I'm doing here, but I love it. Can't wait to see what happens next.
				</p>
				<hr></hr>
				<br /><br />
			</div>				
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