<?php include_once("include/head.php")?>

<body class="page-buttons" onload="prettyPrint()">

<?php include_once("include/header.php")?>

<section role="main" class="buttons">	
		
<h1>Buttons</h1>

<article class="snippet" id="snippet-button-1">
	<h1>Plain button</h1>
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/button-1.html') ?></code></pre>
			
			<h2>Instructions</h2>
			<div class="instructions">
				<dl>
					<dt><code>button:hover { cursor:pointer }</code></dt>
					<dd>This makes the cursor hand-shaped when you hover over the button.</dd>
				</dl>
			</div>
		</div>
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<button>Click me</button>
			</div>
		</div>
	</div>
	
</article>

<article class="snippet" id="snippet-button-2">
	<h1>Button with rounded corners</h1>
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/button-2.html') ?></code></pre>
		</div>
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<button>Click me</button>
			</div>
		</div>
	</div>
	
</article>

</section>

<?php include_once("include/footer.php")?>