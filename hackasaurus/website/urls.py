from django.conf.urls.defaults import patterns, include, url

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'hackasaurus.views.home', name='home'),
    url(r'^$', 'hackasaurus.website.views.home'),
)
