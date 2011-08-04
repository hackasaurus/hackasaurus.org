import os
import sys
import subprocess
from hashlib import sha256
from cgi import parse_qs

ROOT = os.path.abspath(os.path.dirname(__file__))
path = lambda *x: os.path.join(ROOT, *x)

endpoints = {}

def expose(endpoint):
    def decorator_maker(func):
        endpoints[endpoint] = func
        return func
    return decorator_maker

def application(env, start):
    if env['PATH_INFO'] in endpoints:
        return endpoints[env['PATH_INFO']](env, start)
    return error_404(env, start)

def error(env, start, status, message=None):
    if not message:
        message = status
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(message)))]
    start(status, response_headers)
    return [message]

def error_404(env, start):
    return error(env, start, '404 Not Found', 
                 'Not Found: %s' % env['PATH_INFO'])

@expose('/update-site')
def update_site(env, start):
    retval = subprocess.call(['git', 'pull'], cwd=path('..'))
    status = '200 OK'
    output = str(retval)
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(output)))]
    start(status, response_headers)
    return [output]
