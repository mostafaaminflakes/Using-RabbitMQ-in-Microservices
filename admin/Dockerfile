#################################
# With Alpine
# FROM php:7.4-fpm-alpine

# ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# RUN apk add --no-cache \
#     && chmod uga+x /usr/local/bin/install-php-extensions && sync \
#     && install-php-extensions pdo \
#     pdo_mysql \
#     sockets
# Install composer
# @composer
#################################
# Without Alpine [Larger build]
# FROM php:8

# RUN apk update
# RUN apt-get install -y git
# RUN apk add --no-cache git
# RUN docker-php-ext-install pdo pdo_mysql sockets
# RUN docker-php-ext-install zip
# RUN apk add --no-cache \
#     libzip-dev \
#     zip \
#     && docker-php-ext-install zip
# COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
# COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
#################################
FROM php:8.1-fpm
# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install PHP extensions
# RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets
RUN docker-php-ext-install pdo pdo_mysql sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#################################

WORKDIR /app
COPY . .
RUN composer install