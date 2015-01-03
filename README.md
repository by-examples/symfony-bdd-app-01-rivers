How to run the project?
=======================

[![Build Status](https://travis-ci.org/by-examples/symfony-bdd-app-01-rivers.svg?branch=2.6.1%2Fsymfony-bdd-app-01-rivers)](https://travis-ci.org/by-examples/symfony-bdd-app-01-rivers)

This example is explained in the post
[Symfony/BDD/Behat/Tutorial: Application 01: Rivers](/2015/01/04/symfony-bdd-app-01-rivers.html).

##1. Preliminary step

First, you need to create and install Vagrant box
named `symfony-v0.4.4`. You will find the instruction
in the post titled
[Generating symfony-v0.4.4 box](http://by-examples.net/2014/12/23/generating-symfony-0-4-4-box.html).

##2. Running the example

    $ git clone https://github.com/by-examples/symfony-bdd-app-01-rivers.git
    $ cd symfony-bdd-app-01-rivers
    $ vagrant up
    $ vagrant ssh
    $ composer install -o
    $ ./reload.bash

##3. Running the tests

    $ vagrant ssh
    $ ./reload.bash
    $ bin/behat

##4. Visit the application with the browser

Now, you can run the web browser and visit:

    http://localhost:8880/
    http://localhost:8880/app_dev.php/

##5. Tested?

Windows: not tested

