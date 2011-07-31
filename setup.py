from setuptools import setup, find_packages

from bootstrap.bootstrap import install_requires

setup(
    name='hackasaurus',
    version='0.1',
    packages=find_packages(),
    author='The Hackasaurus Team',
    author_email='rawr@hksr.us',
    install_requires=install_requires
    )
