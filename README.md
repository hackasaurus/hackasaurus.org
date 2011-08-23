This is the content for the website at [hackasaurus.org].

## Prerequisites

You need Python version 2.6 or higher.

## Setup

If you have Python, just run this at the terminal prompt:

    cd hackasaurus.org
    python manage.py runserver

Then, point your browser to http://localhost:8000/.

## Security

These major known vulnerabilities ought to be fixed before any sensitive
information is served from the domain this site is hosted on:

1. The blog section pulls in data from a Yahoo Pipe and injects its content as
raw HTML.

  [hackasaurus.org]: http://hackasaurus.org
