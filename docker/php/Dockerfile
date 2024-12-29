FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# Allow super user - set this if you use Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Obtain Composer
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy application files to the working directory
COPY ../../ .

# Install
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

# Run composer dump-autoload --optimize
RUN composer dump-autoload --optimize