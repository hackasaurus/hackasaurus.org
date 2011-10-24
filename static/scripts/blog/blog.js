var feedLoaded = jQuery.getJSON("http://pipes.yahoo.com/pipes/pipe.run?" +
                                "_id=acd9b281e46ad78b6c34873ba277626c&" +
                                "_render=json");
var entries = null;

jQuery.when(feedLoaded).then(function(data) {
  var entryObjects = [];
  var entryTemplate = $("#templates .entry");

  entries = $('#blog .entries').empty();
  
  data.value.items.forEach(function(item) {
    var entry = {
      title: item['y:title'],
      date: new Date(item['pubDate'] ||                  // Wordpress
                     item.published),                    // Blogger
      author: item['dc:creator'] ||                      // Wordpress
              (item.author &&                            // Blogger
               item.author.name),
      content: item['content:encoded'] ||                // Wordpress
                (item.content &&                         // Blogger
                 item.content.content)
    };

    if (typeof(item.link) == 'string')
      entry.link = item.link;                            // Wordpress
    else
      entry.link = item.link[item.link.length-1];        // Blogger
    
    if (isNaN(entry.date))
      entry.date = null;

    /* Anna hand-rolls her RSS feed and either doesn't include author
     * info, or Yahoo Pipes can't parse it, so... */
    if (!entry.author)
      entry.author = "Anna";
    
    entryObjects.push(entry);
  });

  entryObjects.forEach(function addSidebarLink(item) {
    var link = $('<li><a></a></li>');
    link.find('a').attr('href', item.link).text(item.title);
    $("#blog .recent-posts").append(link);
  });
  
  entryObjects.slice(0, 3).forEach(function createBlogPost(item) {
    var entry = entryTemplate.clone();
    entry.find(".title a").text(item.title);
    entry.find(".title a").attr("href", item.link);

    if (item.date)
      // TODO: non-Firefox browsers don't parse some kinds of
      // dates; we need to use a library or something to parse
      // them.
      entry.find(".date").text(item.date.format("mmmm dS, yyyy"));

    entry.find(".author").text(item.author);
    entry.find(".content").html(item.content);

    // Remove the really gross-looking "Comments: 0" and "Tweet it!"
    // images that Wordpress adds.
    entry.find('.content img').each(function() {
      if ($(this).attr("src").match(/feeds.wordpress.com/))
        $(this).remove();
    });

    entries.append(entry);
  });
  
  $(".throbber").hide();
  $(".two-column").fadeIn();
});