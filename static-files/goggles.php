<?php include_once("include/module/head.php")?>

<?php include_once("include/module/header.php")?>
	
<section class="inner-page tool-goggles" role="main">

	<div class="content-primary">
		
		<h1>X-Ray Goggles</h1>
		
		<h2>Step 1) Install X-Ray Goggles</h2>
		<p>Drag the X-Ray Goggles up to your web browser's bookmarks toolbar:</p>
		
		<p><a id="bookmarklet-link" href="javascript:(function(){'use strict';var script=document.createElement('script');script.src='https://secure.toolness.com/webxray/webxray.js';script.className='webxray';document.head.appendChild(script);})();">Web X-Ray Goggles</a></p>
		
		<img class="screenshot bookmarklet-demo" src="include/image/bookmarklet.gif" alt="bookmarklet" width="328" height="142" />
	
	<div class="helper">
	<h3>Having trouble?</h3>
    <p>Make sure your browser's bookmarks toolbar is turned on. (<a href="http://support.mozilla.com/en-US/kb/how-do-i-use-bookmarks#w_how-do-i-turn-on-the-bookmarks-toolbar">How?</a>)</p>
	</div>
		
		
		
		<h2>Step 2: Turn them on</h2>
		<p>Click on the X-Ray Goggles to activate. (Warning: may alter reality.)</p>

<img class="screenshot" src="include/image/screenshot-bookmarklet.png" alt="Example of the bookmarklet installed" />
		
		<h2>Step 3: Bust your hack</h2>
		<p>Go to your favorite web page. Mouse over any element. Hit "R" to remix it.</p>


	<!-- Examples Slideshow -->
	<div class="examples">
		<h2>Remix, make and share</h2>
		<p>Hackasaurus makes it easy to remix and change any web page like magic. Or create your own.</p>
		<div class="slideshow-gallery">
			<div class="slideshow">
				<div class="slides">
					<div class="flickr">
						<div class="loader">
							<img src="include/image/loader.gif" alt="loader"/>
						</div>
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=10&display=random&size=m&layout=x&source=user_set&set=72157626727930269&user=60647737@N04">
						</script>
					</div>
				</div>
				<p id="next">Next</p>
				<p id="prev">Prev</p>
			</div>
		</div>
	</div>
	<!-- End Examples Slideshow -->

	
	</div>
	
	<div class="content-secondary goggle-controls">
	
		<img src="include/image/supergirl.png" alt="supergirl" width="300" height="330" />
		
		<h2>X-Ray Goggles controls:</h2>
		
		<h3>Remix</h3>
		<kbd>R</kbd>
		<p>Remix an element using HTML.</p>
		
		<h3>Inspect</h3>
		<kbd>I</kbd>
		<p>Learn more about the element</p>
		
		<h3>Tear</h3>
		<kbd>T</kbd>
		<p>Copy and paste the code to remix on your own page.</p>
		
		<h3>Off</h3>				
		<kbd>Esc</kbd>	
		<p>Hit "Esc" to deactivate.</p>
		
	</div>
	
</section>

<script type="text/javascript" src="include/script/jquery.cycle.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slides .flickr').cycle({
		fx: 'fade',
		startingSlide: 2,
		pause: 0,
		prev: '#prev',
		speed: 500,
		next: '#next'
	});
});
</script>

<?php include_once("include/module/footer.php")?>