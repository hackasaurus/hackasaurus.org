import sys
import os

ROOT = os.path.dirname(os.path.abspath(__file__))

def path(*a):
    return os.path.join(ROOT, *a)

sys.path.insert(0, path('vendor'))

import jinja2
from hackasaurus.management import execute_manager
from hackasaurus.tinysite import BasicFileServer

static_files_dir = path('static-files')

def handle_html_file_as_jinja2_template(wsgi_env, root_dir, fullpath):
    loader = jinja2.FileSystemLoader(root_dir, encoding='utf-8')
    env = jinja2.Environment(loader=loader, extensions=['jinja2.ext.i18n'])
    if 'translation' in wsgi_env:
        env.install_gettext_translations(wsgi_env['translation'])
    else:
        env.install_null_translations(newstyle=True)
    template = env.get_template(fullpath[len(root_dir):])
    return ('text/html', template.render().encode('utf-8'))

if __name__ == '__main__':
    execute_manager(
        build_dir=path('build'),
        static_files_dir=static_files_dir,
        locale_dir=path('locale'),
        locale_domain='default',
        babel_ini_file=path('babel.ini'),
        ext_handlers={
            '.html': handle_html_file_as_jinja2_template
        },
        handlers=[]
        )
