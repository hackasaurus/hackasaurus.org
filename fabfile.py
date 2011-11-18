import os

from fabric.api import *
from fabric.contrib.project import rsync_project

ROOT = os.path.abspath(os.path.dirname(__file__))

@task
def deploy():
    with lcd(ROOT):
        local('python manage.py build')
        rsync_project(remote_dir='/var/hackasaurus.org',
                      local_dir='dist/')
