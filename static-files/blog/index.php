<?php include_once("../include/module/head.php") ?>

<script src="../include/script/date.format.js"></script>

<script>
var feedLoaded = jQuery.getJSON("http://pipes.yahoo.com/pipes/pipe.run?" +
                                "_id=acd9b281e46ad78b6c34873ba277626c&" +
                                "_render=json");
var entries = null;

jQuery.when(feedLoaded).then(function(data) {
  var entryTemplate = $("#templates .entry");

  entries = $('<div class="entries"></div>');
  $("#blog").empty().append(entries);

  data.value.items.forEach(function(item) {
    var entry = entryTemplate.clone();
    entry.find(".title a").text(item['y:title']);

    var link = null;
    
    if (typeof(item.link) == 'string')
      link = item.link;                                     // Wordpress
    else
      link = item.link[item.link.length-1];                 // Blogger
    
    entry.find(".title a").attr("href", link);

    var date = new Date(item['pubDate'] ||                  // Wordpress
                        item.published);                    // Blogger

    if (!isNaN(date))
      // TODO: non-Firefox browsers don't parse some kinds of
      // dates; we need to use a library or something to parse
      // them.
      entry.find(".date").text(date.format("mmmm dS, yyyy"));

    entry.find(".author").text(item['dc:creator'] ||        // Wordpress
                               (item.author &&              // Blogger
                                item.author.name));
    entry.find(".content").html(item['content:encoded'] ||  // Wordpress
                                (item.content &&            // Blogger
                                 item.content.content));

    // Remove the really gross-looking "Comments: 0" and "Tweet it!"
    // images that Wordpress adds.
    entry.find('.content img').each(function() {
      if ($(this).attr("src").match(/feeds.wordpress.com/))
        $(this).remove();
    });

    entries.append(entry);
  });
});
</script>

<?php include_once("../include/module/header.php") ?>

<section role="main" class="page-blog">

<div id="blog">
	<div class="loader">
		<img src="/include/image/loader.gif" alt="loader"/>
		<p>Loading blog posts&hellip;</p>
	</div>
</div>

</section>

<div id="templates" style="display: none;">
  <div class="entry bucket">
    <h2 class="title"><a></a></h2>
    <div class="date"></div>
    <div class="author"></div>
    <div class="content"></div>
  </div>
</div>
	
<?php include_once("../include/module/footer.php")?>