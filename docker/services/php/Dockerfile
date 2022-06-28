FROM php:8.1.0-fpm

RUN apt-get update && apt-get install -y \
        git \
        zip \
        unzip \
        libicu-dev \
        libbz2-dev \
        libpng-dev \
        libjpeg-dev \
        libmcrypt-dev \
        libreadline-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN composer global require hirak/prestissimo

COPY ./php.ini /usr/local/etc/php/php.ini
WORKDIR /code

RUN usermod -u 1000 www-data
RUN chown -R www-data /code

RUN mkdir /var/www/.composer/
RUN chown -R www-data /var/www/.composer/

USER www-data

RUN rm -rf /var/cache/apk/*

CMD ["php-fpm", "--nodaemonize"]
