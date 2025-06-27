# Use the official PHP image with Apache
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Enable Apache modules
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html

# Set the correct Apache document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache configuration
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install and build Node.js dependencies
RUN npm install && npm run build

# Create necessary directories and set permissions
RUN mkdir -p /var/www/html/storage/logs \
    /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/bootstrap/cache

RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache

RUN chmod -R 775 /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Create database directory and file with proper permissions
RUN mkdir -p /var/www/html/database && \
    touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/database && \
    chmod -R 775 /var/www/html/database && \
    chmod 664 /var/www/html/database/database.sqlite

# Copy custom Apache configuration
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Generate application key
RUN php artisan key:generate --force

# Run database migrations
RUN php artisan migrate --force

# Run database seeding
RUN php artisan db:seed --force

# Clear all caches
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Set final permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 775 /var/www/html/storage && \
    chmod -R 775 /var/www/html/database && \
    chmod 664 /var/www/html/database/database.sqlite && \
    chmod -R 775 /var/www/html/bootstrap/cache

# Create an entrypoint script to handle permissions at runtime
RUN echo '#!/bin/bash\n\
# Ensure proper permissions at runtime\n\
chown -R www-data:www-data /var/www/html/storage /var/www/html/database /var/www/html/bootstrap/cache\n\
chmod -R 775 /var/www/html/storage /var/www/html/database /var/www/html/bootstrap/cache\n\
if [ -f /var/www/html/database/database.sqlite ]; then\n\
    chmod 664 /var/www/html/database/database.sqlite\n\
fi\n\
# Start Apache in foreground\n\
exec apache2-foreground\n\
' > /usr/local/bin/docker-entrypoint.sh && \
chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 80
EXPOSE 80

# Start Apache using the entrypoint script
CMD ["/usr/local/bin/docker-entrypoint.sh"]
