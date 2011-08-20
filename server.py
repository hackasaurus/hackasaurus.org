import sys
import os
from wsgiref.util import shift_path_info

ROOT = os.path.dirname(os.path.abspath(__file__))

def path(*a):
    return os.path.join(ROOT, *a)

sys.path.insert(0, path('wsgi-scripts'))
sys.path.insert(0, path('vendor'))

import hackasaurus_dot_org
import jinja2
import tinysite
from lamp_emulation import apply_htaccess, load_php

DEFAULT_PORT = 8000
static_files_dir = path('static-files')

def handle_html_file_as_jinja2_template(root_dir, fullpath):
    loader = jinja2.FileSystemLoader(root_dir, encoding='utf-8')
    env = jinja2.Environment(loader=loader)
    template = env.get_template(fullpath[len(root_dir):])
    return ('text/html', template.render().encode('utf-8'))

def handle_php_file(root_dir, fullpath):
    return ('text/html', load_php(root_dir, fullpath))

EXT_HANDLERS = {
    '.html': handle_html_file_as_jinja2_template,
    '.php': handle_php_file
    }

def wsgi_api_handler(env, start):
    if env['PATH_INFO'].startswith('/wsgi/'):
        shift_path_info(env)
        return hackasaurus_dot_org.application(env, start)

def htaccess_handler(env, start):
    htaccess_path = os.path.join(static_files_dir, ".htaccess")
    return apply_htaccess(env, start, open(htaccess_path, "r"))

HANDLERS = [wsgi_api_handler, htaccess_handler]

if __name__ == '__main__':
    cmd = 'serve'
    if len(sys.argv) == 2:
        cmd = sys.argv[1]
    if cmd == 'export':
        print "exporting static site"
        tinysite.export_site(
            build_dir=path('build'),
            static_files_dir=static_files_dir,
            ext_handlers=EXT_HANDLERS
            )
    elif cmd == 'serve':
        url = "http://127.0.0.1:%s/" % DEFAULT_PORT
        print "development server started at %s" % url
        print "press CTRL-C to stop it"
        tinysite.run_server(
            port=DEFAULT_PORT,
            static_files_dir=static_files_dir,
            handlers=HANDLERS,
            ext_handlers=EXT_HANDLERS,
            default_filenames=['index.html', 'index.php']
            )
    else:
        print 'unknown command: %s' % cmd
