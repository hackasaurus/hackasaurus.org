This is the content for the website at [hackasaurus.org].

## Prerequisites

Before developing on the website, you just need Python version 2.3 or higher. It comes with OS X and Linux, but you will probably need to download it from  [python.org] if you’re on Windows.

## Setup

To get started, just run `server.py`, then open your favorite Web browser to [http://localhost:8002/](http://localhost:8002/).

## Architecture

This Website is just a bunch of static HTML/JS/CSS files. The one unusual part of the architecture is that the file `page-template.html` is dynamically loaded by every page to automatically make every page have the same header and footer content. This is done on the client-side, by the user's browser, to keep things simple on the server side.

  [hackasaurus.org]: http://hackasaurus.org
  [python.org]: http://python.org/
