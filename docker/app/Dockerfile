FROM php:8.2.3-cli-alpine3.17

WORKDIR /var/www/html

RUN apk add --no-cache \
    php81-dev npm \
    g++ make \
    bash nano \
    && pecl install openswoole-22.0.0 \
    && docker-php-ext-enable openswoole \
    && apk del g++ make \
    && rm -rf /tmp/*

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

EXPOSE 9000 5173