# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install mysqli

# Salin file PHP ke direktori yang sesuai di container
COPY index.php /var/www/html/

# Expose port yang digunakan oleh Apache (port 80 secara default)
EXPOSE 80
