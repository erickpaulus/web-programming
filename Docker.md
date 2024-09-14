# Panduan Instalasi dan Menjalankan PHP & MySQL dalam Docker

Panduan ini menjelaskan cara mengatur lingkungan **PHP** dan **MySQL** menggunakan **Docker** dengan bantuan **Docker Compose**. Dengan Docker, Anda dapat membuat lingkungan yang konsisten tanpa perlu konfigurasi manual yang rumit di mesin lokal.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal:
1. [Docker](https://docs.docker.com/get-docker/)
2. [Docker Compose](https://docs.docker.com/compose/install/)

## Langkah-Langkah

### 1. Buat Proyek Direktori

Buat direktori baru untuk proyek Anda:

```bash
mkdir proyek-web-php-mysql
cd proyek-web-php-mysql
```
### 2. Struktur Direktori
Buat struktur direktori sebagai berikut ini:
```bash
/proyek-web-php-mysql
   ├── docker-compose.yml
   └── src
       └── index.php
```
### 3. Tulis File docker-compose.yml
Tulis file docker-compose.yml di dalam direktori proyek Anda:
```bash
version: '3.8'

services:
  # PHP dan Apache
  web:
    image: php:8.0-apache
    container_name: php-app
    volumes:
      - ./src:/var/www/html
    ports:
      - "8080:80"
    depends_on:
      - db
    networks:
      - app-network

  # MySQL
  db:
    image: mysql:5.7
    container_name: mysql-db
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: my_database
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    volumes:
      - db-data:/var/lib/mysql
    networks:
      - app-network

volumes:
  db-data:

networks:
  app-network:
```
