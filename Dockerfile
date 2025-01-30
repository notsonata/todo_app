FROM php:8.1-apache

# Install PostgreSQL dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html/
EXPOSE 80