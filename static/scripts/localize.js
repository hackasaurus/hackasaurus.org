(function(jQuery) {
  "use strict";
  
  var $ = jQuery;
  
  function normalizeLanguage(language) {
    var match = language.match(/([A-Za-z]+)-([A-Za-z]+)/);
    if (match)
      return match[1].toLowerCase() + "-" + match[2].toUpperCase();
    return language.toLowerCase();
  }

  function inArray(item, arr) {
    return arr.indexOf(item) != -1;
  }

  function indexOfNearMatch(locale, available) {
    var match;
    if (locale.indexOf('-') != -1) {
      var localeParts = locale.split('-');
      match = available.indexOf(localeParts[0]);
    } 
    else {
      match = available.map(function(locale){ 
        var localeParts = locale.split('-');
        return localeParts[0];
      }).indexOf(locale);
    }
    return match;
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
          jQuery.localization.activate(bestMatch, true);
        });
      },
      findBestMatch: function(locale, available) {
        locale = normalizeLanguage(locale);
        if (inArray(locale, available)){
          return locale;
        }
        else {
          var nearMatch = indexOfNearMatch(locale, available);
          if (nearMatch == -1) {
            return this.DEFAULT;
          }
          return available[nearMatch];
        }
      },
      activate: function(locale, replaceState) {
        var newURL = '/' + locale + '/';
        if (replaceState && window.history && window.history.replaceState) {
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
