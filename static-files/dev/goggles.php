<?php include_once("include/module/head.php")?>

<?php include_once("include/module/header.php")?>
	
<section class="inner-page tool-goggles" role="main">

	<div class="content-primary">
		
		<h1>X-Ray Goggles</h1>
		<p>Change and remix your favorite web pages like magic! Here's how:</p>
		
		<h2>Step 1: Install the Goggles</h2>
		<p>It's easy! Just drag this bookmarklet <a id="bookmarklet-link" href="javascript:(function(){"use strict";var script=document.createElement("script");script.src="https://secure.toolness.com/webxray/webxray.js";script.className="webxray";document.head.appendChild(script);})();">Web X-Ray Goggles</a> up to your web browser's bookmarks toolbar:</p>
		
		
		
		<img class="screenshot bookmarklet-demo" src="include/image/bookmarklet.gif" alt="bookmarklet" width="328" height="142" />
		
		<!--<img class="screenshot" src="include/image/screenshot-bookmarklet.png" alt="Example of the bookmarklet installed" />-->
		
		<h2>Step 2: Turn them on</h2>
		<p>Click on the X-Ray Goggles in your browser's toolbar.</p>
		
		<h2>Step 3: Try them out!</h2>
		<p>Now go to any web page you like. Move your mouse over the different parts of the page.</p>
		
		<img class="screenshot" src="include/image/screenshot-goggles-inspect.png" alt="Using the goggles to inspect the web" />
		
		<p>The Goggles will show you how the page is made.  And make it easy for you to mess around with it.</p>
		
		<img class="screenshot" src="include/image/screenshot-goggles-remix.png" alt="The goggles in action" />
	
	</div>
	
	<div class="content-secondary">
	
		<img src="include/image/supergirl.png" alt="supergirl" width="300" height="330" />
		
		<h3>Having trouble?</h3>
		<p>Make sure your browser's bookmarks toolbar is turned on.</p>
		<p>The Goggles will work with Firefox and Chrome. Support for other browsers coming soon.</p>
		
		<h3>X-Ray Goggles controls:</h3>
		
		<h4>Remix element</h4>
		<kbd>R</kbd>
		<p>Mess about with the code and change the page, live
Learn more about element</p>
		
		<h4>Inspect the building blocks of the web</h4>
		<kbd>I</kbd>
		
		<h4>"Tear out" page</h4>
		<kbd>T</kbd>
		<p>Copy the code to remix elsewhere (link to HTMLpad)</p>
		
		<h4>Turn off Goggles</h4>				
		<kbd>Esc</kbd>	
		
	</div>
	
</section>

<?php include_once("include/module/footer.php")?>