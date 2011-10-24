(function showLanyrdInfoWithTransition() {
  /* There doesn't seem to be an easy way to nicely transition-in the
   * lanyrd splat, and mutation events like DOMNodeInserted don't fire
   * in IE, so we'll just resort to polling the DOM. */
  var intervalID = setInterval(function() {
    var list = $("ol.lanyrd-listing");
    if (list.length) {
      $(".throbber").remove();
      clearInterval(intervalID);
      list.slideDown();
    }
  }, 250);
})();
