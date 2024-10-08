FROM php:8.0-apache

# Install PDO and PDO_MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy application files to the container
COPY src/ /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
