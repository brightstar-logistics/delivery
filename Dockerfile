# Use the official PHP 8.0.2 image with Apache as the base image
FROM php:8.0.2-apache

# Install required system packages
RUN apt-get update && \
    apt-get install -y \
        libicu-dev \
        zip \
        unzip && \
    rm -rf /var/lib/apt/lists/*

# Install required PHP extensions and enable mod_rewrite
RUN docker-php-ext-install \
        pdo_mysql \
        intl && \
    a2enmod rewrite

# Copy your application code
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

RUN set -eux; \
# allow writable to public
    ln -sf /var/www/html/public/logs/test.html /var/www/html/writable/logs/test.html && \
    ln -sf /var/www/html/writable/logs/log-2023-05-13.log /var/www/html/public/logs/log-2023-05-13.log

# PHP configs
COPY docker-php.ini $PHP_INI_DIR/conf.d/docker-php.ini
COPY docker-apache.conf /etc/apache2/sites-available/000-default.conf

# Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install CodeIgniter 4 dependencies
# RUN composer install

# Set the proper permissions for the writable folder
RUN chown -R www-data:www-data /var/www/html/writable

# Expose the default HTTP port
EXPOSE 80
