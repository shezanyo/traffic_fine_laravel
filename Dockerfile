# Use official PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql mbstring xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel project files
COPY . .

# Install Laravel dependencies, ignoring ext-http
RUN composer install --ignore-platform-req=ext-http --no-dev --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Run migrations and create symbolic storage link
RUN php artisan storage:link || true
RUN php artisan migrate || true

# Expose PHP-FPM port (9000) and Laravel development server port (8000)
EXPOSE 9000 8000

# Start PHP-FPM in the background and Laravel's built-in server
CMD php-fpm & php artisan serve --host=0.0.0.0 --port=8000
