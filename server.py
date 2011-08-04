import sys
import os
import re
import mimetypes
import httplib
from wsgiref.simple_server import make_server
from wsgiref.util import shift_path_info, FileWrapper

my_dir = os.path.dirname(__file__)

sys.path.append(os.path.join(my_dir, 'wsgi-scripts'))

import hackasaurus_dot_org

port = 8000
static_files_dir = os.path.abspath(os.path.join(my_dir, 'static-files'))
php_include = re.compile(r'<\?php\s+include_once\s*\(["\'](.*)["\']\s*\)\s*\?>')

mimetypes.add_type('application/x-font-woff', '.woff')

def apply_htaccess(env, start):
    for line in open(os.path.join(static_files_dir, ".htaccess"), "r"):
        parts = line.split()
        if parts[0] == "redirect":
            code, redirect_from, redirect_to = parts[1:]
            if env['PATH_INFO'] == redirect_from:
                w3c_name = httplib.responses[int(code)]
                start('%s %s' % (code, w3c_name), [('Location', redirect_to)])
                return []
        else:
            print "unknown htaccess rule: %s" % rule
    return None

def load_php(root_dir, filename, indent=0):
    print "%sload_php %s" % ("  " * indent, filename[len(root_dir):])
    contents = open(filename, 'r').read()
    cwd = os.path.dirname(filename)

    def include(match):
        phpfile = match.group(1)
        if phpfile[0] == '/':
            return load_php(root_dir, root_dir + phpfile)
        return load_php(root_dir, os.path.join(cwd, phpfile), indent+1)

    return php_include.sub(include, contents)

def try_loading(filename, env, start):
    fileparts = filename[1:].split('/')
    fullpath = os.path.join(static_files_dir, *fileparts)
    fullpath = os.path.normpath(fullpath)
    (mimetype, encoding) = mimetypes.guess_type(fullpath)
    if (fullpath.startswith(static_files_dir) and
        not '.git' in fullpath):
        if os.path.isfile(fullpath):
            if mimetype:
                filesize = os.stat(fullpath).st_size
                start('200 OK', [('Content-Type', mimetype),
                                 ('Content-Length', str(filesize))])
                return FileWrapper(open(fullpath, 'rb'))
            elif fullpath.endswith('.php'):
                contents = load_php(static_files_dir, fullpath)
                start('200 OK', [('Content-Type', 'text/html'),
                                 ('Content-Length', str(len(contents)))])
                return [contents]
        elif os.path.isdir(fullpath) and not filename.endswith('/'):
            start('302 Found', [('Location', filename + '/')])
            return []
    return None

def application(env, start):
    if env['PATH_INFO'].startswith('/wsgi/'):
        shift_path_info(env)
        return hackasaurus_dot_org.application(env, start)
    else:
        result = apply_htaccess(env, start)
        if result is not None:
            return result
        filename = env['PATH_INFO']
        if filename.endswith('/'):
            for index in ['index.html', 'index.php']:
                result = try_loading(filename + index, env, start)
                if result is not None:
                    return result
        result = try_loading(filename, env, start)
        if result is not None:
            return result
        return hackasaurus_dot_org.error_404(env, start)

if __name__ == '__main__':
    print "serving on port %d" % port
    httpd = make_server('', port, application)
    httpd.serve_forever()
