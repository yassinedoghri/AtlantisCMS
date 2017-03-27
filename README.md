# AtlantisCMS

Atlantis CMS is a Crisis Management System web app to monitor crisis situations in Singapore.

## Table of contents

* [Getting Started](#getting-started)
* [User interface](#user-interface)
* [Versioning](#versioning)
* [Contributors](#contributors)
* [Copyright and licence](#copyright-and-licence)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development purposes.

#### 1. Download and Install one of these software bundles:

 - [WAMP](http://www.wampserver.com/) (recommended)
 - [XAMPP](https://www.apachefriends.org/fr/index.html)
 - [EASYPHP](http://www.easyphp.org/)
 - etc.

#### 2. Install [Git](https://git-scm.com/downloads)

- (Optional) Install [github desktop](https://desktop.github.com/)

#### 3. Clone the project to your computer

- **eg.** clone it to the `C:/wamp/www` folder

#### 4. Download and Install [Composer](https://getcomposer.org/download/):

 - Specify the path to the PHP executable which was installed with the first step
 - After installation, use the command line, go to the root of the project and run:

```sh
# installs the project dependencies listed in composer.json
$ composer update
```

_**NB.** A prompt will ask you to input the project parameters to create the `/app/config/parameters.yml` file.
Enter the relevant parameters or leave it to default values._  

#### 5. Install [NodeJS](https://nodejs.org/en/) and [Bower](https://bower.io/#install-bower)

On the root or `static` folder of the project, you can now:

- Install Bower dependencies

```sh
# install php-xml, resolves XmlUtils.php:52 problem
$ apt install php-xml
# installs the project dependencies listed in bower.json
$ bower install
```

- Install npm dependencies

```sh
# installs the project dependencies listed in package.json
$ npm install
```

#### 6. To run the Symfony3 website, go to the project root folder with the command line and execute:
 
```sh
 $ php bin/console server:run
```

_**NB.** You need to [add your PHP installation directory to the %PATH% environment variable](http://stackoverflow.com/a/7307581) beforehand._

**The server should be running on the default address: `http://127.0.0.1:8000`**

## User interface

The UI of Atlantis CMS is based on [gentelella](https://github.com/puikinsh/gentelella), an open source Bootstrap 3 Admin Template.

## Versioning

AtlantisCMS is maintained under the [Semantic Versioning guidelines](http://semver.org/).

## Contributors

This project is a school project for the CZ3003 module at the Nanyang Technological University (NTU) of Singapore.

### Student Team

- [Yassine Doghri](https://github.com/yassinedoghri)
- // ADD YOUR NAME

## Copyright and licence

// TO DO - Project licence.
