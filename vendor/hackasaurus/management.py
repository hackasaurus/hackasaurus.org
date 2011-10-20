import argparse

from . import tinysite

def execute_manager(build_dir, static_files_dir, ext_handlers,
                    handlers, default_filenames=None):
    def cmd_build(args):
        "build static site"

        tinysite.export_site(
            build_dir=build_dir,
            static_files_dir=static_files_dir,
            ext_handlers=ext_handlers
            )

    def cmd_runserver(args):
        "run development server"

        tinysite.run_server(
            port=args.port,
            static_files_dir=static_files_dir,
            handlers=handlers,
            ext_handlers=ext_handlers,
            default_filenames=default_filenames
            )

    if default_filenames is None:
        default_filenames = ['index.html']

    parser = argparse.ArgumentParser()
    subparsers = parser.add_subparsers()
    build = subparsers.add_parser('build', help=cmd_build.__doc__)
    build.set_defaults(func=cmd_build)
    runserver = subparsers.add_parser('runserver', help=cmd_runserver.__doc__)
    runserver.add_argument('--port', help='port to serve on',
                           type=int, default=8000)
    runserver.set_defaults(func=cmd_runserver)
    args = parser.parse_args()
    args.func(args)
