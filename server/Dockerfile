FROM php:7.1-fpm

RUN docker-php-ext-install mysqli pdo_mysql
RUN usermod -u 1000 www-data
RUN chown www-data:www-data -R /var/www/html