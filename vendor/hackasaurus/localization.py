import os
import sys

from babel import Locale, UnknownLocaleError
from babel.messages.frontend import CommandLineInterface

def parse_locale(name):
    try:
        return Locale.parse(name, sep='-')
    except (ValueError, UnknownLocaleError):
        return None

def find_locales(dirname, domain):
    return [name for name in os.listdir(dirname)
            if locale_exists(name, dirname, domain)]

def locale_exists(locale, dirname, domain):
    pofile = os.path.join(dirname, locale, 'LC_MESSAGES',
                          '%s.po' % domain)
    return os.path.exists(pofile)

def babel(args):
    cmdline = CommandLineInterface()
    cmdline.usage = 'pybabel %s %s'
    print "calling pybabel %s" % (" ".join(args))
    cmdline.run([sys.argv[0]] + args)

