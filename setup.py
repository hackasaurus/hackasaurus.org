from setuptools import setup

from bootstrap.bootstrap import install_requires

setup(
    name='hackasaurus',
    version='0.1',
    packages=['hackasaurus'],
    author='The Hackasaurus Team',
    author_email='rawr@hksr.us',
    install_requires=install_requires
    )
