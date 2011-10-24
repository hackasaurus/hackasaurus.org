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
