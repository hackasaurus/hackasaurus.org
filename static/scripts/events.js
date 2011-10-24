(function showLanyrdInfoWithTransition() {
  var intervalID = setInterval(function() {
    var list = $("ol.lanyrd-listing");
    if (list.length) {
      $(".throbber").remove();
      clearInterval(intervalID);
      list.slideDown();
    }
  }, 1000);
})();
