import os

from fabric.api import *
from fabric.contrib.project import rsync_project

ROOT = os.path.abspath(os.path.dirname(__file__))

def lexists(path):
    with settings(warn_only=True):
        return local('test -e %s' % path).succeeded

@task
def deploy():
    with lcd(ROOT):
        if not lexists('locale'):
            local('git clone https://github.com/hackasaurus/hackasaurus-locales.git locale')
        local('python manage.py compilemessages')
        local('python manage.py build')
        rsync_project(remote_dir='/var/hackasaurus.org',
                      local_dir='dist/')
