module("jQuery.localization");

test("jQuery.localization.findBestMatch()", function() {
  var l10n = jQuery.localization;
  equal(l10n.findBestMatch("en-GB", ["fr"]),
        l10n.DEFAULT,
        "unmatched code gives default");
  equal(l10n.findBestMatch("en-GB", ["fr", "en-GB"]),
        "en-GB",
        "exact match works");
  equal(l10n.findBestMatch("en-gb", ["fr", "en-GB"]),
        "en-GB",
        "case-inspecific exact match works");
  equal(l10n.findBestMatch("en-GB", ["fr", "en"]),
        "en",
        "match to less specific locale works");
  equal(l10n.findBestMatch("en", ["fr", "en-GB"]),
        "en-GB",
        "match to more specific locale works");
});

module("cleanBlogEntries()");

test("cleanBlogEntries() sanitizes", function() {
  deepEqual(cleanBlogEntries([{
    link: "javascript:foo()",
    'content:encoded': '<p onclick="evil()">hello</p>',
    'dc:creator': 'Bob'
  }]), [{
    title: undefined,
    date: null,
    author: "Bob",
    content: "<p>hello</p>",
    link: null
  }], "Javascript URLs and event handlers are removed");
});
