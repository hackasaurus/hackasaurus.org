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
				<table summary="a description of what's in the table">
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

</section>

<?php include_once("include/footer.php")?>