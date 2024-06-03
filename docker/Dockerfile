# Use the official WordPress image as the base
FROM wordpress:php7.3

# Install additional dependencies
RUN apt-get update && apt-get install -y \
    curl \
    less \
    vim \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/* \
    // && docker-php-ext-configure gd --with-freetype --with-jpeg \
    // && docker-php-ext-install -j$(nproc) gd mysqli zip

# Optionally, you can perform additional customizations here
# For example, you might want to configure Apache/Nginx or install more PHP extensions

# Set the working directory
WORKDIR /var/www/html

COPY ../msadnet .

# Expose port 80
EXPOSE 80

# Start the web server
CMD ["apache2-foreground"]
