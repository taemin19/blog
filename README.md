# Create your first PHP blog
The project is to create a professional blog.
The website is divided into two main groups of pages:
- Frontend pages: home page, blog page, post page.
- Backend pages: add post page, update post page (there is no user management with authentication/authorization).

The main programming language for application development is PHP based on the design pattern MVC.

## Getting started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
Composer for external libraries:
- [Installation - Linux / Unix / OSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- [Installation - Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)

External libraries:
- [Twig](https://twig.symfony.com/) (Twig needs at least PHP 7.0.0 to run.)

### Installing
Installing the project:
- Copy the repository in your local server, you should have an arborescence like this:

![arborescence](https://user-images.githubusercontent.com/25587621/30973213-dd62fd7c-a46c-11e7-95e3-e652019505e5.PNG)

- Create a virtual host for the project

Installing Twig via composer:
- Execute on `lib/` directory the command line `composer require "twig/twig:^2.0"`

### Running the tests
Send mail with contact form:
- Download [FakeSendMail](https://www.glob.com.au/sendmail/) and unzip its contents on the drive where the application is installed:
  - for example like this `C:\Wamp\sendmail`
- Configure smtp server and default domain in `sendmail.ini`
  - for example with a Gmail account
  
![](https://user-images.githubusercontent.com/25587621/30973224-e2e73b82-a46c-11e7-8aba-3fd8f6153829.PNG)

- Edit `sendmail_path` in the `php.ini` file of your local server
  - for example like this `sendmail_path = "C:\Wamp\sendmail\sendmail.exe"`

Database demo data:
- Import [ocp5_test.zip](https://github.com/taemin19/danielthebault/files/1341306/ocp5_test.zip) in your local databases

### Authors
- Daniel Thébault
