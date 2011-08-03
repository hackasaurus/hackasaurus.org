from django.template import RequestContext
from django.http import HttpResponse
from django.shortcuts import render_to_response

def home(request):
    context = RequestContext(request)
    return render_to_response("hackasaurus/index.html", {},
                              context_instance=context)

def blog(request):
    context = RequestContext(request)
    return render_to_response("hackasaurus/blog.html", {},
                              context_instance=context)
