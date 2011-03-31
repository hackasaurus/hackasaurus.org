import os
import sys
from hashlib import sha256
from cgi import parse_qs

endpoints = {}

def expose(endpoint):
    def decorator_maker(func):
        endpoints[endpoint] = func
        return func
    return decorator_maker

def application(env, start):
    if env['PATH_INFO'] in endpoints:
        return endpoints[env['PATH_INFO']](env, start)
    return error_404(env, start)

def error(env, start, status, message=None):
    if not message:
        message = status
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(message)))]
    start(status, response_headers)
    return [message]

def error_404(env, start):
    return error(env, start, '404 Not Found', 
                 'Not Found: %s' % env['PATH_INFO'])

@expose('/update-site')
def update_site(env, start):
    status = '200 OK'
    result = os.system('cd /var/hackasaurus/www && git pull')
    if result == 0:
        output = 'site updated.'
    else:
        output = 'an error occurred while updating the site.'
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(output)))]
    start(status, response_headers)
    return [output]

def notify_recruitment(env, form_id, form_data):
    from smtplib import SMTP
    from pprint import pformat

    server = SMTP(env['smtp.server'])

    if 'smtp.password' in env:
        server.login(env['smtp.username'], env['smtp.password'])

    fromaddr = env['smtp.username']
    toaddrs = env['recruitment.notify'].split()

    submitter = repr(form_data.get('email', ['UNKNOWN'])[0])

    msg = ("Subject: Recruitment form submitted by %s\r\n"
           "From: %s\r\n"
           "To: %s\r\n"
           "\r\n"
           "This is form ID %s.\r\n\r\n%s" % (submitter,
                                              fromaddr,
                                              toaddrs[0],
                                              form_id,
                                              pformat(form_data)))

    server.sendmail(fromaddr, toaddrs, msg)
    server.quit()

@expose('/recruit-me')
def recruit_me(env, start):
    MAX_SIZE = int(env['recruitment.max_size'])
    TURING_ANSWER = env['recruitment.turing_answer']
    OUTPUT_DIR = env['recruitment.output_dir']

    length = int(env.get('CONTENT_LENGTH', '0'))

    if env['REQUEST_METHOD'] != 'POST':
        return error(env, start, '405 Method Not Allowed')

    if length == 0:
        return error(env, start, '411 Length Required')

    if length > MAX_SIZE:
        return error(env, start, '413 Request Entity Too Large')

    raw_input = env['wsgi.input'].read(length)
    input = parse_qs(raw_input)

    if not ('turingAnswer' in input and
            input['turingAnswer'][0].lower().strip() == TURING_ANSWER):
        return error(env, start, '403 Forbidden',
                     'No spam-bots allowed!')

    status = '200 OK'
    filename = sha256(raw_input).hexdigest()
    f = open(os.path.join(OUTPUT_DIR, filename), 'w')
    f.write(raw_input)
    f.close()

    if 'recruitment.notify' in env:
        notify_recruitment(env, form_id=filename, form_data=input)

    output = 'Stored recruitment form with ID %s.' % filename

    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(output)))]
    start(status, response_headers)

    return [output]
