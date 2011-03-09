$(window).ready(function() {
  var contents = $(document.body).contents();
  var hasReplacementHeader = $("#header").length != 0;
  contents.detach();
  $(document.body).load('/page-template.html', function() {
    if (hasReplacementHeader)
      $("#header").remove();
    else
      $("#header .title").text(document.title);
    $(this).find("#contents-placeholder").replaceWith(contents);
  });
});
