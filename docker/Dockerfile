FROM php:8

RUN apt-get update
RUN apt-get -y install git build-essential libzip-dev zlib1g-dev default-mysql-client
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN ln -s /composer.phar /usr/bin/composer
RUN chmod 777 /usr/bin/composer
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-install pdo pdo_mysql zip
RUN composer global require laravel/installer

RUN mkdir /app

WORKDIR /app

CMD [ "artisan" ]