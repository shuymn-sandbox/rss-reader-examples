FROM php:7.2-fpm-alpine

RUN apk --update add autoconf g++ make

RUN set -x \
    && printf "\n" | pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN set -x \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo_mysql mysqli opcache

COPY ./conf.d /usr/local/etc/php/conf.d/
