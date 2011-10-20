import os
import mimetypes
import traceback
import shutil
from wsgiref.simple_server import make_server
from wsgiref.util import FileWrapper

mimetypes.add_type('application/x-font-woff', '.woff')

def simple_response(start, contents, code='200 OK', mimetype='text/plain'):
    start(code, [('Content-Type', mimetype),
                 ('Content-Length', str(len(contents)))])
    return [contents]

def handle_request(env, start, handlers):
    try:
        for handler in handlers:
            response = handler(env, start)
            if response is not None:
                return response
        return simple_response(start, "Not Found: %s" % env['PATH_INFO'],
                               code='404 Not Found')
    except Exception:
        msg = "500 INTERNAL SERVER ERROR\n\n%s" % traceback.format_exc()
        return simple_response(start, msg, code='500 Internal Server Error')

class BasicFileServer(object):
    def __init__(self, static_files_dir):
        self.ext_handlers = {}
        self.default_filenames = []
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
                    return simple_response(start, contents, mimetype=mimetype)
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

def run_server(port, static_files_dir, handlers=None, ext_handlers=None,
               default_filenames=('index.html',)):
    if handlers is None:
        handlers = []
    if ext_handlers is None:
        ext_handlers = {}

    file_server = BasicFileServer(static_files_dir)
    file_server.default_filenames.extend(list(default_filenames))
    file_server.ext_handlers.update(ext_handlers)
    handlers += [file_server.handle_request]

    def application(env, start):
        return handle_request(env, start, handlers=handlers)

    httpd = make_server('', port, application)

    url = "http://127.0.0.1:%s/" % port
    print "development server started at %s" % url
    print "press CTRL-C to stop it"

    httpd.serve_forever()

def export_site(build_dir, static_files_dir, ext_handlers, ignore=None):
    if os.path.exists(build_dir):
        shutil.rmtree(build_dir)
    shutil.copytree(static_files_dir, build_dir, ignore=ignore)
    for dirpath, dirnames, filenames in os.walk(build_dir):
        files = [os.path.join(dirpath, filename)[len(build_dir)+1:]
                 for filename in filenames
                 if os.path.splitext(filename)[1] in ext_handlers]
        for relpath in files:
            print "processing special file: %s" % relpath
            abspath = os.path.join(static_files_dir, relpath)
            handler = ext_handlers[os.path.splitext(relpath)[1]]
            mimetype, contents = handler(static_files_dir, abspath)
            open(os.path.join(build_dir, relpath), 'w').write(contents)
    print "done.\n\nyour new static site is located at:\n%s" % build_dir
