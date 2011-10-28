// These are 'bugs' on the page that need to be fixed by the
// user.

var bugs = {
  image: {
    isFixed: function isImageHacked(context) {
      var url = $("#image-url", context).val();
      return $("div.remix-chamber img", context).attr("src") == url;
    },
    achievement: "#url-hacker.achievement",
    onAchieved: function() {
      $("div#success").slideDown();
    }
  }
};

// These are hints to display as the user explores the page and UI.

var bugHints = [
  {
    content: ".remix.hint",
    when: {
      matches: "div.remix-chamber img",
      notFixed: bugs.image
    }
  }
];

// These are hints to display to the user explores the
// remix dialog. All hints to display must be in the
// 'remix-dialog-hints' div in index.html.

var remixDialogBugHints = [
  {
    content: ".attr.hint",
    when: {
      matches: "div.remix-chamber img",
      // The user must be hovering over a particular attribute's
      // value in the element's 'pretty view' for the hint to
      // be displayed.
      isOnAttributeValue: "src",
      notFixed: bugs.image
    }
  }
];

// These are the CSS style properties to show in the style info
// overlay.

var stylePropertiesToShow = [
  "float",
  "font-family",
  "font-size",
  "color",
  "background-color",
  "background-image"
];

// If the remix dialog needs any additional stylesheets or scripts
// for this script to execute properly, they should be added here.

var remixDialogPageMods = {
  stylesheets: [],
  scripts: []
};
