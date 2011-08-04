This is the content for the website at [hackasaurus.org].

## Prerequisites

You need either:

1. PHP and Apache, or
2. Python.

Note that PHP should *only* be used for server-side includes via the
`include_once()` function.

## Setup

If you have PHP and Apache, point the document root of your Apache configuration to the `static-files` directory.

If you have Python, just run `python server.py` and point your browser to
http://localhost:8000/.

## Security

These major known vulnerabilities ought to be fixed before any sensitive
information is served from the domain this site is hosted on:

1. The blog section pulls in data from a Yahoo Pipe and injects its content as
raw HTML.

  [hackasaurus.org]: http://hackasaurus.org
