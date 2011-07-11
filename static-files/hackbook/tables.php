<?php include_once("include/head.php")?>

<?php include_once("include/header.php")?>

<section role="main" class="page-tables">
		
<h1>Tables</h1>

<article class="snippet" id="snippet-table-1">
	<h1>Table with headings along the top</h1>
	<div class="examples">
		<div class="how-it-looks">
			<h2>How it looks</h2>
			<div class="preview">
				<table>
					<tr>
						<th>Heading 1</th>
						<th>Heading 2</th>
						<th>Heading 3</th>
					</tr>
					<tr>
						<td>Item 1</td>
						<td>Item 2</td>
						<td>Item 3</td>
					</tr>
					<tr>
						<td>Item 1</td>
						<td>Item 2</td>
						<td>Item 3</td>
					</tr>
				</table>
			</div>
			<a class="button" href="http://jsbin.com/ijunis/3/edit#html,live">Hack This</a>
		</div>
		<div class="how-it-works">
			<h2>The code</h2>
			<pre class="code"><code class="prettyprint lang-html"><?php include_once('library/snippet/table-1.html') ?></code></pre>
			<div class="instructions">
				<dl>
					<dt><code>tr</code></dt>
					<dd>Table row</dd>
					<dt><code>th</code></dt>
					<dd>Table heading</dd>
					<dt><code>td</code></dt>
					<dd>Table data</dd>
				</dl>
			</div>
		</div>
	</div>
</article>

<article class="snippet" id="resources">
	<h1>Resources</h1>
	<div class="examples">
		<ul>
			<li class="article"><a href="http://dev.opera.com/articles/view/19-html-tables/">Opera Web Standards Curriculum: HTML Tables</a></li>
			<li class="article"><a href="http://dev.opera.com/articles/view/33-styling-tables/">Opera Web Standards Curriculum: Styling Tables</a></li>
		</ul>
	</div>
</article>

</section>

<?php include_once("include/footer.php")?>