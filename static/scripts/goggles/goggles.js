function absoluteURL(url) {
  var a = $('<a></a>').attr('href', url);
  return a[0].href;
}

function installHints(ui, hints) {
  var currentTarget = null;
  
  function genericChange() {
    currentTarget = ui.focusedOverlay.getPrimaryElement();
    hints.refresh(currentTarget);
  }
  
  ui.focusedOverlay.on('change', genericChange);
  ui.styleInfoOverlay.on('show', genericChange);
  ui.styleInfoOverlay.on('hide', genericChange);
  ui.styleInfoOverlay.on('lock', function(info) {
    currentTarget = info.element;
    hints.refresh(currentTarget);
  });

  function domEventChange() {
    hints.refresh(currentTarget);
  }

  $(".webxray-row").live({
    mouseover: domEventChange,
    mouseout: domEventChange
  });
}

function BugDisplay(bugs) {
  var fixedBefore = {};
  var self = {
    update: function update() {
      var bugsLeft = 0;
      for (var name in bugs) {
        var bug = bugs[name];
        if (!bug.isFixed())
          bugsLeft++;
        else {
          if (!(name in fixedBefore)) {
            fixedBefore[name] = true;
            if (bug.achievement)
              $(bug.achievement).delay(500).slideDown().delay(2500).slideUp();
            if (bug.onAchieved)
              bug.onAchieved();
          }
        }
      }
    }
  };
  
  self.update();
  
  return self;
}

jQuery.fn.extend({
  propArray: function(prop) {
    return $.makeArray(this.map(function() {
      return this[prop];
    }));
  }
});

function buildPageMods(extraMods) {
  var mods = {
    stylesheets: $("link.include-in-remix-dialog").propArray('href'),
    scripts: $("script.include-in-remix-dialog").propArray('src')
  };

  ['stylesheets', 'scripts'].forEach(function(modType) {
    var absURLs = extraMods[modType].map(absoluteURL);
    mods[modType] = mods[modType].concat(absURLs);
  });

  mods.scripts.push(absoluteURL('/scripts/goggles/remix-dialog-pagemod.js'));
  return mods;
}

$(window).ready(function() {  
  var bugDisplay = BugDisplay(bugs);

  if (navigator.platform.match(/^Mac/))
    $(".non-mac").hide();
  else
    $(".mac").hide();

  $("#bookmarklet").click(function() {
    $(this).addClass("loading");
  });
  
  window.webxrayWhenGogglesLoad = function(ui) {
    var hints = HintManager(ui);

    $("#bookmarklet").removeClass("loading");
    bugHints.forEach(hints.plant);
    installHints(ui, hints);
    ui.commandManager.on('state-change', bugDisplay.update);
    ui.mixMaster.setDialogPageMods(buildPageMods(remixDialogPageMods));
    ui.styleInfoOverlay.setPropertyNames(stylePropertiesToShow);
    ui.focusedOverlay.set($("#bookmarklet")[0]);
  };
});
