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
			<a class="button" href="http://jsbin.com/oripic/1/edit#html,live">Hack This</a>
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
				<a class="button" href="http://jsbin.com/etejoh/1/edit#html,live">Hack This</a>
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
				<a class="button" href="http://jsbin.com/igitiy/1/edit#html,live">Hack This</a>
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
				<a class="button" href="http://jsbin.com/utivep/1/edit#html,live">Hack This</a>
			</div>
			<div class="how-it-works">
				<h2>The code</h2>
				<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/paragraph-2c.html') ?></code></pre>
			</div>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-heading-1">
	<h1>Headings</h1>
	<div class="examples">
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<h1>All about Narwhals</h1>
				<p>Narwhals are whales that live in the Arctic. They have a single helical tusk and swim at depths of up to 1500m.</p>
				<h2>The Narwhal's tusk</h2>
				<p>It is believed the purpose of the Narwhal's tusk is to determine social rank. Narwhals have rarely been seen using their tusk for fighting or breaking sea ice.</p>
				<h2>Population</h2>
				<p>There are estimated to be around 75,000 Narwhals in the wild, and they are a near threatened species.</p>
				<h3>Conservation</h3>
				<p>Narwhals are one of the most vulnerable arctic marine animals to climate change.</p>
				<h4>Threats</h4>
				<p>The only predators to Narwhals besides humans are polar bears and killar whales.</p>
				<h2>Narwhal diet</h2>
				<p>The diet of the Narwhal is very restricted. They prey on halibut, cod, shrimp and squid.</p>
				<h3>Narwhal feeding habits</h3>
				<p>Narwhals feed in deep water, and congregate in groups of five to ten.
				<h4>Diving</h4>
				<p>Narwhals are excellent divers and make some of the deepest dives ever recorded for marine mammals.</p>

			</div>
			<a class="button" href="http://jsbin.com/inereq/2/edit#html,live">Hack This</a>
		</div>
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/heading-1.html') ?></code></pre>
			<div class="instructions">
			<p>When you're using headings, make sure you keep a good structure. h3s should be used as sub-headings of h2s. (Don't jump straight to an h5 after using an h2.)</p>
			<dl>
				<dt><code>&lt;h1&gt;</code></dt>
				<dd>Heading 1 should be used for the title of the page. It should only be used once per page, unless it's in a <code>&lt;section&gt;</code> or an <code>&lt;article&gt;</code> tag.</dd>
				<dt><code>&lt;h2&gt;</code></dt>
				<dd>Heading 2 can be used to break the page content</dd>
				<dt><code>&lt;h3&gt;</code></dt>
				<dd>Heading 3 can be used after Heading 2s for subsections</dd>
				<dt><code>&lt;h4&gt;</code>, <code>&lt;h5&gt;</code>, <code>&lt;h6&gt;</code></dt>
				<dd>Headings 4, 5 and 6 can be used as further sub headings.</dd>
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
			<a class="button" href="http://jsbin.com/ebahuj/1/edit#html,live">Hack This</a>
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
			<a class="button" href="http://jsbin.com/ebahuj/2/edit#html,live">Hack This</a>
		</div>
	</div>
</article>

<article class="snippet" id="snippet-list-3">
	<h1>Numbered list</h1>
	<div class="examples">
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/list-3.html') ?></code></pre>
		</div>
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<ol>
					<li>List item 1</li>
					<li>List item 2</li>
					<li>List item 3</li>
				</ol>
			</div>
			<a class="button" href="http://jsbin.com/ifebuk/1/edit#html,live">Hack This</a>
		</div>
	</div>
</article>


<article class="snippet" id="resources">
	<h1>Resources</h1>
	<div class="examples">
		<ul>
			<li class="article"><a href="http://dev.opera.com/articles/view/15-marking-up-textual-content-in-html/">Opera Web Standards Curriculum: Marking up textual content in HTML</a></li>
			<li class="article"><a href="http://dev.opera.com/articles/view/16-html-lists/">Opera Web Standards Curriculum: HTML lists</a></li>
			<li class="article"><a href="http://dev.opera.com/articles/view/32-styling-lists-and-links/">Opera Web Standards Curriculum: Styling lists and links</a></li>
		</ul>
	</div>
</article>

</section>

<?php include_once("include/footer.php")?>