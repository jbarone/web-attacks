Web Application Attack Demonstration Lab
========================================

This lab environment was created to host a web application that is known to be vulnerable. In fact the application is split into several parts that demonstrate core vulnerabilities in web applications (SQL Injection, Command Injection, Code Injection, and XSS).

This is a LAMP development stack configuration for Vagrant, which means that it is a web application running in a self contained virtual machine, utilizing Linux, Apache, MySQL, and PHP.

Installation:
-------------

Download and install [VirtualBox](http://www.virtualbox.org/)

Download and install [vagrant](http://vagrantup.com/)

Clone this repository

	$ git clone https://github.com/jbarone/web-attacks.git

Go to the repository folder and launch the box

    $ cd web-attacks
    $ vagrant up

vagrant up is the command that will setup and configure you virtual machine. If you've been playing for a while and want to reset the box back to pristine condition, run the following:

	$ vagrant destroy
	$ vagrant up

Using The Lab:
--------------

Once the virtual machine is up and running, you can simply access the lab site by opening a browser and going to:

- [http://192.168.33.10](http://192.168.33.10)
