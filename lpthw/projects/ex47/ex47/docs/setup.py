try:
    from setuptools import setup
except ImportError:
    from distutils.core import setup

config = {
    'description': 'My Project',
    'author': 'Alante\' Adams',
    'url': 'https://www.alanteadams.com',
    'download_url': 'Where to download it.',
    'author_email': 'alanteadams48@yahoo.com',
    'version': '0.1',
    'install_requires': ['nose'],
    'packages': ['NAME'],
    'scripts': [],
    'name': 'projectname'
}

setup(**config)
