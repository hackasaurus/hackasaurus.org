"""
    Affordances for simulating a very limited subset of LAMP
    (Linux/Apache/MySQL/PHP) stack functionality in Python.

    This is intended only to simplify development of solutions that rely on
    LAMP technologies; the code should never be deployed in production
    environments.
"""

import os
import re
import httplib

php_include = re.compile(r'<\?php\s+include_once\s*\(["\'](.*)["\']\s*\)\s*\?>')

def apply_htaccess(env, start, htaccess_file):
    """
    Applies an Apache .htaccess file to the current WSGI request.
    Returns None if no rules applied, otherwise it returns a sequence.
    
    Currently only supports redirects in the .htaccess file.
    """
    
    for line in htaccess_file:
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
    """
    load a PHP file. Only supports PHP's include_once().
    """

    print "%sload_php %s" % ("  " * indent, filename[len(root_dir):])
    contents = open(filename, 'r').read()
    cwd = os.path.dirname(filename)

    def include(match):
        phpfile = match.group(1)
        if phpfile[0] == '/':
            return load_php(root_dir, root_dir + phpfile)
        return load_php(root_dir, os.path.join(cwd, phpfile), indent+1)

    return php_include.sub(include, contents)
