<?php include_once("include/head.php")?>

<?php include_once("include/header.php")?>

<section role="main" class="images">			

<h1>Images</h1>
		
<article class="snippet" id="snippet-image-1">
	<h1>Image</h1>	
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/image-1.html') ?></code></pre>
			<h2>Instructions</h2>	
			<div class="instructions">
				<dl>
					<dt><code>src="&hellip;"</code></dt>
					<dd>This is a link to where the image lives so the browser can find it.</dd>
					<dt><code>alt="&hellip;"</code></dt>
					<dd>This is short for "alternative" and the text you put in here is a description of the image. This is useful for if the image doesn't load, or for people who are using screen readers.</dd>
					<dt><code>width="&hellip;" and height="&hellip;"</code></dt>
					<dd>You can set the dimensions of the image here. If you leave them out, the image will be sized automatically.</dd>
				</dl>
			</div>
		</div>
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<img src="http://hackasaurus.org/hackbook/library/asset/dinosaur.jpg" alt="dinosaur" width="240px" height="180" />
			</div>
			<a class="button" href="http://jsbin.com/edoven/10/edit#html,live">Hack This</a>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-image-2">
	<h1>Image that's also a link</h1>
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/image-2.html') ?></code></pre>
		</div>
	
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="snippet-preview snippet-image-2">
				<a style="" href="http://google.com"><img src="library/asset/dinosaur.jpg" alt="dinosaur" width="240px" height="180" /></a>
			</div>
			<a class="button" href="http://jsbin.com/anewoz/1/edit#html,live">Hack This</a>
		</div>
	</div>
</article>

<article class="snippet">
	<h1>Background image</h1>
	<div class="examples">
		<div class="example">
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/image-background-1.html') ?></code></pre>
				<div class="instructions">
					<dl>
						<dt><code>background-repeat: repeat;</code></dt>
						<dd>This tiles the image on the background. You can change this to <code>background-repeat: no-repeat;</code> to stop the image repeating.</dd>
					</dl>
				</div>
			</div>
		
			<div class="how-it-looks">
				<h2>How it looks</h2>
				<div class="preview" id="snippet-image-background-1">
				</div>
				<a class="button" href="http://jsbin.com/egowat/2/edit#html,live">Hack This</a>
			</div>
		</div>
		<div class="example">
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/image-background-2.html') ?></code></pre>
				<div class="instructions">
					<dl>
						<dt><code>background-position: top center;</code></dt>
						<dd>This positions the image in the top center of the screen. Try mixing it up using <code>left</code>, <code>right</code>, <code>top</code> and <code>bottom</code></dd>
					</dl>
				</div>
			</div>
		
			<div class="how-it-looks">
				<h2>How it looks</h2>
				<div class="preview" id="snippet-image-background-2">
				</div>
				<a class="button" href="http://jsbin.com/egowat/3/edit#html,live">Hack This</a>
			</div>
		</div>
	</div>
</article>

<article class="snippet" id="tutorials">
	<h1>How to add an image</h1>
	<div class="examples">
		<div id="video"></div>
		<div id="captions"></div>
	</div>
</article>

<article class="snippet" id="resources">
	<h1>Resources</h1>
	<div class="examples">
		<ul>
			<li class="article"><a href="http://dev.opera.com/articles/view/17-images-in-html/">Opera Web Standards Curriculum: Images in HTML</a></li>
			<li class="article"><a href="http://dev.opera.com/articles/view/31-css-background-images/">Opera Web Standards Curriculum: CSS background images</a></li>
		</ul>
	</div>
</article>

</section>

<script>
	// Create a popcorn instance by calling the Vimeo player plugin
	var example = Popcorn(Popcorn.vimeo(
		'video',
		'http://player.vimeo.com/video/26331923',
		{ width: 300 } ) 
	);
	
	example.footnote({
		start: 4,
		end: 12,
		text: "Right click on the image and select \"copy image location\"",
		target: "captions"
	});

	example.footnote({
		start: 12,
		end: 17,
		text: "switch to the tab with your hack. This one is at <a href=\"http://jsbin.com/edoven/10/edit#html,live\">http://jsbin.com/edoven/10/edit#html,live</a>",
		target: "captions"
	});

	example.footnote({
		start: 17,
		end: 22,
		text: "select the text within the src=, not including the quote marks",
		target: "captions"
	});
	
	example.footnote({
		start: 22,
		end: 27,
		text: "Paste the link to the image within the quote marks, and you're done!",
		target: "captions"
	});
	
</script>

<?php include_once("include/footer.php")?>