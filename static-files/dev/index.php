<?php include_once("include/head.php")?>

<?php include_once("include/header.php")?>

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
	
		<div class="examples">
			<h2>Mix it up + Share it</h2>
			<p>Hackasaurus makes it easy to change and remix almost any web page. Like this:</p>
			<div class="slideshow-gallery">
				<div class="slideshow">
					<div class="slides">
						<div class="flickr">
							<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=10&display=favorites&size=m&layout=x&source=user&user=60647737@N04"></script>
						</div>
					</div>
					<p id="next">Next</p>
					<p id="prev">Prev</p>
				</div>
			</div>
		</div>
		
		<div class="get-started">
			<h2>Get Started</h2>
			<p><em>It's easy!</em> <a href="goggles.php">Activate your X-Ray Goggles</a> to try now.</p>
			<img src="image/supergirl.png" alt="supergirl" width="300" height="330" />
		</div>
		<?php include_once("include/events.php")?>
		</div>
	
</section>
	
<?php include_once("include/footer.php")?>