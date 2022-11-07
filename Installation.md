# What to do after cloning this project ?

## STEP 1 Installation

## Install PHP

```
sudo apt update && sudo apt upgrade 

sudo apt install software-properties-common ca-certificates lsb-release apt-transport-https 

LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php 

sudo apt update

sudo apt install php8.1-mysql php8.1-mbstring php8.1-xml php8.1-curl 
```

## Install composer

Follow the official [documentation](https://getcomposer.org/download/)

Follow the steps to diagnose composer [here](https://getcomposer.org/doc/articles/troubleshooting.md)

[Add composer to path](https://stackoverflow.com/questions/25373188/how-to-place-the-composer-vendor-bin-directory-in-your-path)

```
echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc
```

or if workign with a .bash_profile add this

```
export PATH="$PATH:$HOME/.composer/vendor/bin"
```

## Install laravel

```
composer global require laravel/installer
```

## STEP 2 start developpement server

_Create app key_

```
php artisan key:generate
```

_Serve_
```
php artisan serve
```