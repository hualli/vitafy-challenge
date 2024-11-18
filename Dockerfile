FROM php:8.3-apache

#Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    && a2enmod rewrite \
    && docker-php-ext-install zip pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

#Change ownership of the working directory
RUN chown -R www-data:www-data /var/www

#Use the user www-data
USER www-data