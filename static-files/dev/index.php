<?php include_once("include/module/head.php")?>

<?php include_once("include/module/header.php")?>

<!-- Javascript for slideshow -->
<script type="text/javascript" src="include/script/jquery.cycle/jquery.cycle.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slides .flickr').cycle({
		fx: 'fade',
		pause: 1,
		prev: '#prev',
		next: '#next'
	});
});
</script>

<section role="main" class="home">

	<!-- Examples Slideshow -->
	<div class="examples">
		<h2>Mix it up + Share it</h2>
		<p>Hackasaurus makes it easy to remix and change any web page like magic. Or create your own.</p>
		<div class="slideshow-gallery">
			<div class="slideshow">
				<div class="slides">
					
					<div class="flickr">
						<div class="loader">
							<img src="include/image/loader.gif" alt="loader"/>
						</div>
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=10&display=random&size=m&layout=x&source=user&user=60647737@N04"></script>
					</div>
				</div>
				<p id="next">Next</p>
				<p id="prev">Prev</p>
			</div>
		</div>
	</div>
	<!-- End Examples Slideshow -->

	<!-- Goggles Teaser -->
	<div class="get-started">
		<h2>Get Started</h2>
		<p>Activate the <a href="goggles.php">X-Ray Goggles</a> to see inside the web -- and use your superpowers to change it!</p>
		<img src="include/image/supergirl.png" alt="supergirl" width="300" height="330" />
	</div>
	<!-- End Goggles Teaser -->

	<!-- Events Listing -->
	<?php include_once("include/module/events.php")?>
	<!-- End Events Listing -->

</section>

<?php include_once("include/module/footer.php")?>