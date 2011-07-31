This is the *work-in-progress* Hackasaurus website, re-forged as a Django
project.

## Getting Started

First, clone the repository and switch to the `django-port` branch:

    $ git clone git://github.com/hackasaurus/hackasaurus.org.git
    $ cd hackasaurus.org
    $ git checkout django-port

Then install all dependencies into an isolated Python environment:

    $ python manage.py bootstrap

Finally, start the development server:

    $ python manage.py runserver

You can now visit http://127.0.0.1:8000/ to view the site.
