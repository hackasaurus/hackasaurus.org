// This is deferred is resolved once page-template.html has been retrieved
// and applied to the current page.
var pageTemplateLoaded = jQuery.Deferred();
// This is an array of all the deferreds to wait on before assuming that the
// page is ready to be shown to the user.
var pageLoaders = [pageTemplateLoaded];
$(window).ready(function() {
var header = $("#header");
var templates = $("#templates");
header.detach();
if (header.length == 0)
header = null;
var contents = $(document.body).contents();
contents.detach();
$(document.body).append(templates);
$(document.body).load('/page-template.html', function() {
if (header)
$("#header.default").replaceWith(header);
else
header = $("#header.default");
header.find(".title").text(document.title);
$("#container").find("#contents-placeholder").replaceWith(contents);
pageTemplateLoaded.resolve();
});
jQuery.when.apply(jQuery, pageLoaders).then(function() {
// Ugh, we need to "refresh" the hash if there is one, so the
// browser tries to jump to named anchors that might be
// mentioned in the content we recently injected.
var hash = window.location.hash;
if (hash.length > 1) {
window.location.hash = "#";
$(document.body).hide();
window.setTimeout(function() {
$(document.body).show();
window.location.hash = hash;
}, 100);
}
});
}); 