import os

from fabric.api import *
from fabric.contrib.project import rsync_project

@task
def deploy():
    local('python manage.py build')
    rsync_project(remote_dir='/var/hackasaurus.org',
                  local_dir='dist/')
