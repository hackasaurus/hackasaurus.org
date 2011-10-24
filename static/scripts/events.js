(function showLanyrdInfoWithTransition() {
  var intervalID = setInterval(function() {
    if ($("div.lanyrd-target-splat li").length) {
      $(".throbber").remove();
      clearInterval(intervalID);
      $("div.lanyrd-target-splat").slideDown();
    }
  }, 1000);
})();
