import sys
import os
import mimetypes
import traceback
from wsgiref.simple_server import make_server
from wsgiref.util import shift_path_info, FileWrapper

my_dir = os.path.dirname(__file__)

for custom_dir in ['wsgi-scripts', 'vendor']:
    sys.path.append(os.path.join(my_dir, custom_dir))

import hackasaurus_dot_org
import jinja2
from lamp_emulation import apply_htaccess, load_php

port = 8000
static_files_dir = os.path.abspath(os.path.join(my_dir, 'static-files'))
htaccess_path = os.path.join(static_files_dir, ".htaccess")
mimetypes.add_type('application/x-font-woff', '.woff')

def load_jinja2_template(root_dir, filename):
    loader = jinja2.FileSystemLoader(root_dir, encoding='utf-8')
    env = jinja2.Environment(loader=loader)
    template = env.get_template(filename)
    return template.render().encode('utf-8')

def try_loading(filename, env, start):
    fileparts = filename[1:].split('/')
    fullpath = os.path.join(static_files_dir, *fileparts)
    fullpath = os.path.normpath(fullpath)
    (mimetype, encoding) = mimetypes.guess_type(fullpath)
    if (fullpath.startswith(static_files_dir) and
        not '.git' in fullpath):
        if os.path.isfile(fullpath):
            if mimetype == 'text/html':
                relpath = fullpath[len(static_files_dir):]
                contents = load_jinja2_template(static_files_dir, relpath)
                start('200 OK', [('Content-Type', 'text/html'),
                                 ('Content-Length', str(len(contents)))])                
                return [contents]
            elif mimetype:
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

def handle_500(env, start):
    exc_type, exc_value, exc_tb = sys.exc_info()
    filepath = os.path.join(my_dir, 'templates', '500.html')
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
    try:
        if env['PATH_INFO'].startswith('/wsgi/'):
            shift_path_info(env)
            return hackasaurus_dot_org.application(env, start)
        else:
            result = apply_htaccess(env, start, open(htaccess_path, "r"))
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
    except Exception, e:
        return handle_500(env, start)

def export_site():
    import shutil
    
    def ignore(dirname, filenames):
        return [filename for filename in filenames
                if filename in ['.git', 'hackbook']
                or filename.endswith('.php')]
        
    build_dir = os.path.abspath(os.path.join(my_dir, 'build'))
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
        export_site()
    elif cmd == 'serve':
        url = "http://127.0.0.1:%s/" % port
        print "serving on port %d" % port
        print "to access your development server, visit %s" % url
        httpd = make_server('', port, application)
        httpd.serve_forever()
    else:
        print 'unknown command: %s' % cmd
