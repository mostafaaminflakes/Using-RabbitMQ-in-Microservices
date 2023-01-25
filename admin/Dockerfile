#################################
# With Alpine
FROM php:8.1-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apk add --no-cache \
    && chmod uga+x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions pdo \
    pdo_mysql \
    sockets \
    # Install composer
    @composer
#################################
# Without Alpine [Larger build]
# FROM php:8.1

# RUN docker-php-ext-install pdo pdo_mysql sockets
# COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
#################################

WORKDIR /app
COPY . .
RUN composer install