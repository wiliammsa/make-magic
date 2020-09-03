FROM php:7.3-apache

RUN apt-get update && apt-get -y install \
    gnupg libzip-dev libxml2-dev libicu-dev -y git vim wget apt-transport-https libpng-dev zip unzip

RUN docker-php-ext-install mbstring pdo_mysql \
    && docker-php-ext-enable pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN sed -i "/<\/VirtualHost>/i<Directory \"\/\">\nOptions FollowSymLinks\nAllowOverride all\n<\/Directory>" /etc/apache2/sites-enabled/000-default.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN chown -R $USER:$USER /var/www

RUN a2enmod rewrite
RUN service apache2 restart
