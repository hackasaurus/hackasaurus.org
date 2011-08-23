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
from hackasaurus.management import execute_manager
from hackasaurus.lamp_emulation import apply_htaccess, load_php

static_files_dir = path('static-files')

def handle_html_file_as_jinja2_template(root_dir, fullpath):
    loader = jinja2.FileSystemLoader(root_dir, encoding='utf-8')
    env = jinja2.Environment(loader=loader)
    template = env.get_template(fullpath[len(root_dir):])
    return ('text/html', template.render().encode('utf-8'))

def handle_php_file(root_dir, fullpath):
    return ('text/html', load_php(root_dir, fullpath))

def wsgi_api_handler(env, start):
    if env['PATH_INFO'].startswith('/wsgi/'):
        shift_path_info(env)
        return hackasaurus_dot_org.application(env, start)

def htaccess_handler(env, start):
    htaccess_path = os.path.join(static_files_dir, ".htaccess")
    return apply_htaccess(env, start, open(htaccess_path, "r"))

if __name__ == '__main__':
    execute_manager(
        build_dir=path('build'),
        static_files_dir=static_files_dir,
        ext_handlers={
            '.html': handle_html_file_as_jinja2_template,
            '.php': handle_php_file
            },
        handlers=[wsgi_api_handler, htaccess_handler],
        default_filenames=['index.html', 'index.php'],
        )
