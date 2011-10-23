(function(jQuery) {
  var $ = jQuery;
  
  function normalizeLanguage(language) {
    var match = language.match(/([A-Za-z]+)-([A-Za-z]+)/);
    if (match)
      return match[1].toLowerCase() + "-" + match[2].toUpperCase();
    return language.toLowerCase();
  }
  
  jQuery.extend({
    localization: {
      DEFAULT: "en-US",
      activateBestLocale: function() {
        var div = $("<div></div>");
        div.load("/" + this.DEFAULT + "/language-selector.html", function() {
          var available = [];
          $(this).find("option").each(function() {
            available.push(this.value);
          });
          var bestMatch = jQuery.localization.findBestMatch(navigator.language,
                                                            available);
          jQuery.localization.activate(bestMatch);
        });
      },
      findBestMatch: function(locale, available) {
        locale = normalizeLanguage(locale);
        var exactMatch = available.indexOf(locale);
        if (exactMatch == -1) {
          // TODO: Implement this.
          return this.DEFAULT;
        }
        return locale;
      },
      activate: function(locale) {
        var newURL = '/' + locale + '/';
        if (window.history && window.history.replaceState) {
          window.history.replaceState({}, "", newURL);
          window.location.reload();
        } else
          window.location = newURL;
      }
    }
  });
  
  $("select.language-selector").live("change", function() {
    jQuery.localization.activate(this.options[this.selectedIndex].value);
  });
})(jQuery);
