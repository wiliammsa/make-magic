FROM php:7.3-apache

RUN apt-get update && apt-get -y install \
    gnupg libzip-dev libxml2-dev libicu-dev -y git vim wget apt-transport-https libpng-dev zip unzip

RUN docker-php-ext-install pdo_mysql 

RUN docker-php-ext-install mbstring \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug pdo_mysql

RUN wget https://getcomposer.org/download/1.10.10/composer.phar -O /usr/local/bin/composer && \
    chmod a+rx /usr/local/bin/composer    

RUN sed -i "/<\/VirtualHost>/i<Directory \"\/\">\nOptions FollowSymLinks\nAllowOverride all\n<\/Directory>" /etc/apache2/sites-enabled/000-default.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www

COPY php.ini /usr/local/etc/php
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d

RUN a2enmod rewrite
RUN service apache2 restart 
