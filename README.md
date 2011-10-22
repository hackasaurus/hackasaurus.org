This is the content for the website at hackasaurus.org.

## Prerequisites

You need Python version 2.6 or higher.

## Setup

Just run this at the terminal prompt:

    cd hackasaurus.org
    python manage.py runserver

Then, point your browser to http://localhost:8000/.

## Development

All static, unlocalized files are in the `static` directory, which are
placed at the root of the web site. The `templates` directory
contains localized [Jinja2][] templates that are located at `/<locale>/` on
the web site, where `<locale>` is the name of a locale like `en-US`.

  [Jinja2]: http://jinja.pocoo.org/

## Deployment

Run this at the terminal prompt:

    python manage.py build
    
This will create a static version of the site, for all supported locales, in 
the `dist` directory. You can copy this directory to any web server that 
serves static files, such as Apache or Amazon S3.
