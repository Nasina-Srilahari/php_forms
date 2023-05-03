FROM php:7.4-apache

# Copy project files to Apache document root
COPY . /var/www/html/

# Install any required PHP extensions
RUN docker-php-ext-install pdo_mysql

# Set Apache document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
