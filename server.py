import sys
import os
from wsgiref.simple_server import make_server
from wsgiref.util import shift_path_info, FileWrapper
from mimetypes import guess_type

my_dir = os.path.dirname(__file__)

sys.path.append(os.path.join(my_dir, 'wsgi-scripts'))

import hackasaurus_dot_org

port = 8000
output_dir = os.path.abspath(os.path.join(my_dir, 'recruitment-forms'))
static_files_dir = os.path.abspath(os.path.join(my_dir, 'static-files'))

if not os.path.exists(output_dir):
    print "Creating %s." % output_dir
    os.mkdir(output_dir)

def application(env, start):
    env['recruitment.max_size'] = 1024
    env['recruitment.turing_answer'] = 'test'
    env['recruitment.output_dir'] = output_dir

    if env['PATH_INFO'].startswith('/wsgi/'):
        shift_path_info(env)
        return hackasaurus_dot_org.application(env, start)
    else:
        filename = env['PATH_INFO']
        if filename.endswith('/'):
            filename = '%sindex.html' % filename
        fileparts = filename[1:].split('/')
        fullpath = os.path.join(static_files_dir, *fileparts)
        fullpath = os.path.normpath(fullpath)
        (mimetype, encoding) = guess_type(fullpath)
        if (fullpath.startswith(static_files_dir) and
            not '.git' in fullpath and
            os.path.isfile(fullpath) and
            mimetype):
            filesize = os.stat(fullpath).st_size
            start('200 OK', [('Content-Type', mimetype),
                             ('Content-Length', str(filesize))])
            return FileWrapper(open(fullpath, 'rb'))
        return hackasaurus_dot_org.error_404(env, start)

if __name__ == '__main__':
    print "serving on port %d" % port
    httpd = make_server('', port, application)
    httpd.serve_forever()
