This is the content for the website at [hackasaurus.org].

## Prerequisites

Before developing on the website, you just need Python version 2.3 or higher. It comes with OS X and Linux, but you will probably need to download it from  [python.org] if you’re on Windows.

## Setup

To get started, just run `server.py`, then open your favorite Web browser to [http://localhost:8002/](http://localhost:8002/).

## Architecture

This Website is just a bunch of static HTML/JS/CSS files. The one unusual part of the architecture is that the file `page-template.html` is dynamically loaded by every page to automatically make every page have the same header and footer content. This is done on the client-side, by the user's browser, to keep things simple on the server side.

For more information on how this system works, see [apply-page-template.js].

## Security

There are two major known vulnerabilities that ought to be fixed before any sensitive information is served from the domain this site is hosted on:

1. The blog section pulls in data from a Yahoo Pipe and injects its content as raw HTML.
2. The gallery section pulls in data from Flickr and injects picture descriptions as raw HTML.

  [hackasaurus.org]: http://hackasaurus.org
  [python.org]: http://python.org/
  [apply-page-template.js]: https://github.com/hackasaurus/hackasaurus.org/blob/master/js/apply-page-template.js
  