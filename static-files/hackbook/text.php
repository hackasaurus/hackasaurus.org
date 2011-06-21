<?php include_once("include/head.php")?>

<?php include_once("include/header.php")?>

<section role="main" class="text">	

<h1>Text</h1>

<article class="snippet" id="snippet-paragraph-1">
	<h1>Paragraphs</h1>
	<div class="examples">
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<p>Lorem ipsum shizznit sit amizzle, consectetuer cool.</p>
				<p>Boom shackalack funky fresh, crackalackin.</p>
			</div>
		</div>
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/paragraph-1.html') ?></code></pre>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-paragraph-2">
	<h1>Adding some text styles</h1>
	<div class="examples">
		<div class="example">
			<div class="how-it-looks">
				<h2>How it looks</h2>
				<div class="preview snippet-paragraph-2a">
					<p>Lorem ipsum shizznit sit amizzle, consectetuer cool.</p>
				</div>
			</div>
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/paragraph-2a.html') ?></code></pre>
				<h2>Instructions</h2>
				<div class="instructions">
					<p>When styling the text, we use something called a "font stack". We start with the one we really want, then in case that one isn't available, we choose a fallback.</p>
					<p>In this case out preferred font is "Helvetica", but not all computers have this so we've also picked "Arial". If the computer doesn't have either of these, it will use any "sans-serif" font.</p>
				</div>
			</div>
		</div>
		<div class="example">
			<div class="how-it-looks">
				<h2>How it looks</h2>
				<div class="preview snippet-paragraph-2b">
					<p>Lorem ipsum shizznit sit amizzle, consectetuer cool.</p>
				</div>
			</div>
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/paragraph-2b.html') ?></code></pre>
			</div>
		</div>
		<div class="example">
			<div class="how-it-looks">
				<h2>How it looks</h2>
				<div class="preview snippet-paragraph-2c">
					<p>Lorem ipsum shizznit sit amizzle, consectetuer cool.</p>
				</div>
			</div>
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/paragraph-2c.html') ?></code></pre>
			</div>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-list-1">
	<h1>Bulleted list with circles</h1>
	<div class="examples">
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<ul>
					<li>List item 1</li>
					<li>List item 2</li>
					<li>List item 3</li>
				</ul>
			</div>
		</div>
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/list-1.html') ?></code></pre>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-list-2">
	<h1>Bulleted list with squares</h1>
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/list-2.html') ?></code></pre>
			<div class="instructions">
				<p>In this example, we've used a bit of CSS to change the bullet style of all the list items.</p>
			</div>
		</div>
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<ul>
					<li>List item 1</li>
					<li>List item 2</li>
					<li>List item 3</li>
				</ul>
			</div>
		</div>
	</div>
</article>

</section>

<?php include_once("include/footer.php")?>