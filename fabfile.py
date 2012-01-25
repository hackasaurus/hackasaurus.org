import os

from fabric.api import *
from fabric.contrib.project import rsync_project

ROOT = os.path.abspath(os.path.dirname(__file__))

@task
def deploy():
    with lcd(ROOT):
        if not os.path.exists('locale'):
            local('git clone https://github.com/hackasaurus/hackasaurus-locales.git locale')
        local('python manage.py compilemessages')
        local('python manage.py build')
        rsync_project(remote_dir='/var/hackasaurus.org',
                      local_dir='dist/')
