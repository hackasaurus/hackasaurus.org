This is the content for the website at [hackasaurus.org].

## Prerequisites

You need PHP and Apache. PHP is only used for server-side includes.

## Setup

To get started, point the document root of your Apache configuration
to the `static-files` directory.

## Security

These major known vulnerabilities ought to be fixed before any sensitive information is served from the domain this site is hosted on:

1. The blog section pulls in data from a Yahoo Pipe and injects its content as raw HTML.

  [hackasaurus.org]: http://hackasaurus.org
