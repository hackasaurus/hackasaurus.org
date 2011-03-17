var pageLoaders = [];

$(window).ready(function() {
  var header = $("#header");
  header.detach();
  if (header.length == 0)
    header = null;

  var contents = $(document.body).contents();
  contents.detach();

  var templateLoaded = jQuery.Deferred();

  pageLoaders.push(templateLoaded);

  $(document.body).load('/page-template.html', function() {
    if (header)
      $("#header.default").replaceWith(header);
    else
      header = $("#header.default");

    header.find(".title").text(document.title);
    $("#container").find("#contents-placeholder").replaceWith(contents);
    templateLoaded.resolve();
  });

  window.setTimeout(function() {
    jQuery.when.apply(jQuery, pageLoaders).then(function() {
      $(window).trigger("beforepagedisplay");

      // Ugh, we need to "refresh" the hash if there is one, so the
      // browser tries to jump to named anchors that might be
      // mentioned in the content we just injected.

      var hash = window.location.hash;
      if (hash.length > 1) {
        window.location.hash = "#";
        $(document.body).hide();
        window.setTimeout(function() {
          $(document.body).show();
          window.location.hash = hash;
        }, 100);
      }
    });
  }, 0);
});
