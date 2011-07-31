import subprocess
import sys
import os
import traceback
from distutils.dir_util import remove_tree

ROOT = os.path.dirname(os.path.abspath(__file__))
path = lambda *a: os.path.join(ROOT, *a)

requirements = path('..', 'requirements.txt')
req_contents = open(requirements, 'r').read()
install_requires = req_contents.splitlines()

def bootstrap(main):
    '''
    Optionally sets up a virtualenv and installs all our dependencies
    into it.
    
    When finished, runs main().
    '''

    vdir = path('..', '.virtualenv')

    bootstrap_only = False

    if len(sys.argv) == 2 and sys.argv[1] == 'bootstrap':
        bootstrap_only = True
        print "Bootstrapping dependencies into a virtual environment."

        if os.path.exists(vdir):
            print "The virtual environment appears to already exist."
            answer = raw_input("Do you want to re-initialize it (y/N)? ")
            if answer != 'y':
                print "Ok, aborting."
                sys.exit(1)

        if os.path.exists(vdir):
            print "Removing existing virtual environment..."
            remove_tree(vdir)
        
        subprocess.check_call([sys.executable, path('virtualenv.py'),
                               vdir])

    if os.path.exists(vdir):
        # The user has previously bootstrapped, so use the virtual
        # environment.

        # See if our dependencies changed since we last looked at them.
        last_requirements = path(vdir, 'requirements.txt')
        last_req_contents = ''
        if os.path.exists(last_requirements):
            last_req_contents = open(last_requirements, 'r').read()
        if req_contents != last_req_contents:
            pip = path(vdir, 'bin', 'pip')
        
            # Install the dependencies with pip.
            subprocess.check_call([pip, 'install', '-r', requirements])

            open(last_requirements, 'w').write(req_contents)

        # Activate the virtualenv. (Code taken from virtualenv docs.)
        activate_this = path(vdir, 'bin', 'activate_this.py')
        execfile(activate_this, dict(__file__=activate_this))

    if bootstrap_only:
        print "Bootstrapping successful."
        sys.exit(0)

    try:
        main()
    except ImportError, e:
        sys.stderr.write(traceback.format_exc())
        sys.stderr.write(
            "You may want to run '%s bootstrap' to "
            "install all dependencies.\n" % sys.argv[0]
            )
        sys.exit(1)
