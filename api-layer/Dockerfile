FROM php:8.1-apache

# Install system dependencies and PHP extensions commonly needed by CI4
RUN apt-get update \  
  && apt-get install -y --no-install-recommends \  
     git \  
     zip \  
     unzip \  
     libicu-dev \  
     libonig-dev \  
     libzip-dev \  
     libpng-dev \  
     libjpeg-dev \  
     libfreetype6-dev \  
     libxml2-dev \  
  && docker-php-ext-configure gd --with-freetype --with-jpeg \  
  && docker-php-ext-install -j$(nproc) pdo pdo_mysql mysqli mbstring intl xml zip gd \  
  && apt-get clean \  
  && rm -rf /var/lib/apt/lists/*

# Enable apache modules for CI4 (pretty URLs)
RUN a2enmod rewrite headers

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . /var/www/html
WORKDIR /var/www/html

# If composer.json exists, install dependencies (ignore errors if not present)
RUN if [ -f composer.json ]; then composer install --no-dev --no-interaction --optimize-autoloader; fi

# Set permissions for writable folder used by CI4
RUN chown -R www-data:www-data /var/www/html \  
  && if [ -d writable ]; then chmod -R 0775 writable; fi

EXPOSE 80

# Use apache foreground command
CMD ["apache2-foreground"]
