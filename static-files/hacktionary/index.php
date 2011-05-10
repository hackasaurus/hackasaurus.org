<!DOCTYPE HTML>
<html>

<head>
	
	<!-- Meta Data -->
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Hackasaurus Snippet Library</title>
	
	<!-- Links -->
	<link href="style/reset.css" rel="stylesheet" type="text/css">
	
	<!-- Browser compatibility -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Syntax Highlighter JS files -->
	<link href="script/syntax-highlighter/src/prettify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="script/syntax-highlighter/src/prettify.js"></script>

</head>

<body onload="prettyPrint()">
	
	<header>
		<h1>Hackasaurus Snippet Library</h1>
		<img class="logo" src="image/hackasaurus.png" alt="" />
	</header>
	
	<nav>
		<ul>
			<li><a href="#lists">Lists</a></li>
			<li><a href="#buttons">Buttons</a></li>
		</ul>
	</nav>
	
	<section role="main">

		<p class="introduction">Hackasaurus makes it easy for anyone to uncover and mess around with the building blocks that make up the web&ndash;empowering them to move from digital consumers to active producers, and see the web as a space they can shape, remix and make better.</p>

		<h2 id="lists">Lists</h2>
		
		<article>
			
			<h3>Bulleted list with circles</h3>

			<div class="example-code">
				<h4>The code</h4>
				<pre class="snippet-code"><code class="prettyprint lang-html"><?php include_once('snippet/list-1.html') ?></code></pre>
			</div>

			<div class="example-preview">
				<h4>How it looks</h4>
				<div class="snippet-preview snippet-list-1">
					<ul>
						<li>List item 1</li>
						<li>List item 2</li>
						<li>List item 3</li>
					</ul>
				</div>
			</div>
		
		</article>
		
		<article>

			<h3>Bulleted list with squares</h3>
			<p>In this example, we've used a bit of CSS to change the bullet style of all the list items.</p>
			
			<div class="example-preview">
				<h4>How it looks</h4>
				<div class="snippet-preview snippet-list-2">
					<ul>
						<li>List item 1</li>
						<li>List item 2</li>
						<li>List item 3</li>
					</ul>
				</div>
			</div>
			
			<div class="example-code">
				<h4>The code</h4>
				<pre class="snippet-code"><code class="prettyprint lang-html"><?php include_once('snippet/list-2.html') ?></code></pre>
			</div>
			
		</article>

		<h2 id="buttons">Buttons</h2>
		
		<article>
			
			<h3>Plain button</h3>

			<div class="example-code">
				<h4>The code</h4>
				<pre class="snippet-code"><code class="prettyprint lang-html"><?php include_once('snippet/button-1.html') ?></code></pre>
			</div>

			<div class="example-preview">
				<h4>How it looks</h4>
				<div class="snippet-preview snippet-button-1">
					<button>Push me</button>
				</div>
			</div>
			
		</article>

		<article>
			
			<h3>Button with rounded corners</h3>
			
			<div class="example-code">
				<h4>The code</h4>
				<pre class="snippet-code"><code class="prettyprint lang-html"><?php include_once('snippet/button-2.html') ?></code></pre>
			</div>

			<div class="example-preview">
				<h4>How it looks</h4>
				<div class="snippet-preview snippet-button-2">
					<button>Push me</button>
				</div>
			</div>
			
		</article>

	</section>
	
	<footer>
		<p>Portions of this content are &copy;1998&ndash;2011 by individual mozilla.org contributors. Content available under a <a target="new" href="http://creativecommons.org/licenses/by/3.0/" rel="license">Creative Commons Attribution 3.0 Unported License</a>.</p>
		<img class="logo" src="image/mozilla_wht_small.png" alt="Mozilla"/>
	</footer>
	
</body>
	
</html>