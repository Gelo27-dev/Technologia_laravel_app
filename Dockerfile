# Build assets with Node.js
FROM node:18-alpine AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# PHP application image
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libicu-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath zip intl \
    && a2enmod rewrite headers expires \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copy PHP application sources
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
COPY composer.* ./
RUN composer install --optimize-autoloader --no-interaction --no-dev --prefer-dist

# Copy frontend build artifacts from the node builder stage
COPY --from=node-builder /app/public/build ./public/build

# Ensure required directories exist and permissions are correct
RUN mkdir -p storage/framework/cache data storage/app storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Create a default environment file if missing
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --force

EXPOSE 80
CMD ["apache2-foreground"]
