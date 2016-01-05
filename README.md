That's me
=========

:warning: Project is in **ALPHA** :a: development stage.

A little application displaying API data from GitHub, StackOverflow, ... Built with [Phundament nano](https://github.com/phundament/nano).

![screen-thats-me](https://cloud.githubusercontent.com/assets/649031/12098515/1e4ac7ee-b323-11e5-8ee1-bfb0d26817a2.png)

## Requirements

- [docker](https://docs.docker.com/engine/installation/)
- [docker-compose](https://docs.docker.com/compose/) **>=1.5.2**

## Installation

[Download](https://github.com/phundament/nano/releases) the latest release and start by setting up the `vendor` folder 
for local development and code-completion

    docker-compose run php composer install

Start stack

    docker-compose up -d

Check the logs, especially when you are starting a fresh stack, since the setup may take a minute
    
    docker-compose logs
    
When you see `Application initialized.` you are ready to open the application in your browser
    
OS X
    
    open http://192.168.99.100:8023
    
Ubuntu
    
    xdg-open http://192.168.99.100:8023

## Usage

To customize the application you have the following options.

### Override existing files

You can override files on the base-image as layed out in Phundament's [`src`](https://github.com/phundament/app/tree/master/src) 
folder. 

By default we're *adding* the src folder to the built image, see [`ADD`](https://docs.docker.com/engine/articles/dockerfile_best-practices/#add-or-copy) 
for details how this works. 

### Change configuration

Add your custom configuration opions to `src/config/local.php`.

### Add `composer` package

A large part of an application usually consists of libraries. To use an library, find the package 
you want to install and edit your `composer.json` file, afterwards run

    docker-compose run --rm php composer update

### Development `bash`

Start a bash in the PHP container to run `yii`, `composer` or other commands.     
    
    docker-compose run --rm php bash

### Create a `yii` module

By default there is `cms` folder mounted in `docker-compose.yml`. You can create a skeleton module there by entering
an application bash and run the following command inside the PHP container

    $ yii gii/module --moduleID=cms --moduleClass=app\\modules\\cms\\Module
    
For more in information see

 - [Phundament README](https://github.com/phundament/app/blob/master/README.md)
 - [Phundament documentation](https://github.com/phundament/docs)
    
## Deploy

Build your image

    docker-compose build

Tag it

    docker tag -f nano_php registry/vendor/image

And push it to a registry    
    
    docker push registry/vendor/image
    
---

Built by [*dmstr](http://diemeisterei.de), Stuttgart :de:
