import sys
import os
import mimetypes
import traceback
from wsgiref.simple_server import make_server
from wsgiref.util import shift_path_info, FileWrapper

ROOT = os.path.dirname(os.path.abspath(__file__))

def path(*a):
    return os.path.join(ROOT, *a)

sys.path.insert(0, path('wsgi-scripts'))
sys.path.insert(0, path('vendor'))

import hackasaurus_dot_org
import jinja2
from lamp_emulation import apply_htaccess, load_php

port = 8000
static_files_dir = path('static-files')
mimetypes.add_type('application/x-font-woff', '.woff')

def handle_request(env, start, handlers):
    try:
        for handler in handlers:
            response = handler(env, start)
            if response is not None:
                return response
    except Exception, e:
        return handle_500(env, start)

def load_jinja2_template(root_dir, filename):
    loader = jinja2.FileSystemLoader(root_dir, encoding='utf-8')
    env = jinja2.Environment(loader=loader)
    template = env.get_template(filename)
    return template.render().encode('utf-8')

class BasicFileServer(object):
    def __init__(self, static_files_dir):
        self.ext_handlers = {}
        self.default_filenames = ['index.html']
        self.static_files_dir = static_files_dir

    def try_loading(self, filename, env, start):
        static_files_dir = self.static_files_dir
        fileparts = filename[1:].split('/')
        fullpath = os.path.join(static_files_dir, *fileparts)
        fullpath = os.path.normpath(fullpath)
        if (fullpath.startswith(static_files_dir) and
            not fullpath.startswith('.')):
            if os.path.isfile(fullpath):
                ext = os.path.splitext(fullpath)[1]
                handler = self.ext_handlers.get(ext)
                if handler:
                    mimetype, contents = handler(static_files_dir, fullpath)
                    start('200 OK', [('Content-Type', mimetype),
                                     ('Content-Length', str(len(contents)))])
                    return [contents]
                (mimetype, encoding) = mimetypes.guess_type(fullpath)
                if mimetype:
                    filesize = os.stat(fullpath).st_size
                    start('200 OK', [('Content-Type', mimetype),
                                     ('Content-Length', str(filesize))])
                    return FileWrapper(open(fullpath, 'rb'))
            elif os.path.isdir(fullpath) and not filename.endswith('/'):
                start('302 Found', [('Location', filename + '/')])
                return []
        return None

    def handle_request(self, env, start):
        filename = env['PATH_INFO']
        if filename.endswith('/'):
            for index in self.default_filenames:
                result = self.try_loading(filename + index, env, start)
                if result is not None:
                    return result
        return self.try_loading(filename, env, start)

def handle_500(env, start):
    exc_type, exc_value, exc_tb = sys.exc_info()
    filepath = path('templates', '500.html')
    template = jinja2.Template(open(filepath, 'r').read())
    contents = template.render(
        exception=traceback.format_exception_only(exc_type, exc_value)[0],
        traceback=traceback.format_exc()
        ).encode('utf-8')
    start('500 Internal Server Error',
          [('Content-Type', 'text/html'),
           ('Content-Length', str(len(contents)))])
    return [contents]

def application(env, start):
    def serve_html_file_as_jinja2_template(root_dir, fullpath):
        relpath = fullpath[len(root_dir):]
        return ('text/html', load_jinja2_template(root_dir, relpath))

    def serve_php_file(root_dir, fullpath):
        return ('text/html', load_php(root_dir, fullpath))

    def wsgi_api_handler(env, start):
        if env['PATH_INFO'].startswith('/wsgi/'):
            shift_path_info(env)
            return hackasaurus_dot_org.application(env, start)

    def htaccess_handler(env, start):
        htaccess_path = os.path.join(static_files_dir, ".htaccess")
        return apply_htaccess(env, start, open(htaccess_path, "r"))

    def not_found_handler(env, start):
        return hackasaurus_dot_org.error_404(env, start)

    file_server = BasicFileServer(static_files_dir)
    file_server.default_filenames.append('index.php')
    file_server.ext_handlers.update({
        '.html': serve_html_file_as_jinja2_template,
        '.php': serve_php_file
    })
    return handle_request(env, start, handlers=[
        wsgi_api_handler,
        htaccess_handler,
        file_server.handle_request,
        not_found_handler
    ])

def export_site(build_dir):
    import shutil
    
    def ignore(dirname, filenames):
        return [filename for filename in filenames
                if filename in ['.git', 'hackbook']
                or filename.endswith('.php')]

    if os.path.exists(build_dir):
        shutil.rmtree(build_dir)
    shutil.copytree(static_files_dir, build_dir, ignore=ignore)
    for dirpath, dirnames, filenames in os.walk(build_dir):
        html_files = [os.path.join(dirpath, filename)[len(build_dir)+1:]
                      for filename in filenames
                      if filename.endswith('.html')]
        for filepath in html_files:
            print "processing template: %s" % filepath
            contents = load_jinja2_template(static_files_dir, filepath)
            open(os.path.join(build_dir, filepath), 'w').write(contents)
    print "done.\n\nyour new static site is located at:\n%s" % build_dir

if __name__ == '__main__':
    cmd = 'serve'
    if len(sys.argv) == 2:
        cmd = sys.argv[1]
    if cmd == 'export':
        print "exporting static site"
        export_site(path('build'))
    elif cmd == 'serve':
        url = "http://127.0.0.1:%s/" % port
        print "development server started at %s" % url
        print "press CTRL-C to stop it"
        httpd = make_server('', port, application)
        httpd.serve_forever()
    else:
        print 'unknown command: %s' % cmd
