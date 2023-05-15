FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y  \
    git \
    unzip \
    libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-scripts --no-autoloader

RUN composer dump-autoload --optimize

WORKDIR /var/www/html
