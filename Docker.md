# Panduan Instalasi dan Menjalankan PHP & MySQL dalam Docker

Panduan ini menjelaskan cara mengatur lingkungan **PHP** dan **MySQL** menggunakan **Docker** dengan bantuan **Docker Compose**. Dengan Docker, Anda dapat membuat lingkungan yang konsisten tanpa perlu konfigurasi manual yang rumit di mesin lokal.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal:
1. <a href="https://docs.docker.com/get-docker/" target="_blank">Docker</a>
2. <a href="https://docs.docker.com/compose/install/" target="_blank">Docker Compose</a>

## Langkah-Langkah

### 1. Buat Proyek Direktori

Buat direktori baru untuk proyek Anda:

```bash
mkdir proyek-web-php-mysql
cd proyek-web-php-mysql
```
### 2. Buat Struktur Direktori
Buat struktur direktori sebagai berikut ini:
```bash
/proyek-web-php-mysql
   ├── docker-compose.yml
   └── src
       └── index.php
```
folder src memuat file html, javascript, css, dan php.
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
      MYSQL_DATABASE: db_dia
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
### 4. Buat File index.php
Buat file index.php di dalam direktori src/ dengan konten berikut:
```bash
<?php
$servername = "mysql-db";
$username = "user";
$password = "password";
$database = "db_dia";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";
?>
```
### 5. Jalankan Docker Compose
Jalankan layanan Docker dengan perintah berikut di direktori proyek Anda:
```bash
docker-compose up -d
```
Perintah ini akan:

- Unduh (download) image PHP dan MySQL dari Docker Hub.
- Menjalankan container PHP-Apache pada port 8080 dan MySQL pada port internal 3306.
- Membuat jaringan app-network untuk komunikasi antara container.
### 6. Akses Aplikasi
Buka browser Anda dan akses:
```bash
http://localhost:8080
```
Anda akan melihat pesan "Koneksi berhasil!" jika PHP berhasil terhubung ke database MySQL.

### 7. Mengelola MySQL
Anda bisa mengakses MySQL melalui container menggunakan perintah berikut:
```bash
docker exec -it mysql-db mysql -u root -p
```
Masukkan password rootpassword (yang telah Anda atur di docker-compose.yml).

### 8. Tambah phpMyAdmin
Tambahkan konten docker-compose.yml dengan perintah berikut :
```bash
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: phpmyadmin
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: rootpassword
    ports:
      - "8081:80"
    depends_on:
      - db
    networks:
      - app-network
```
cara akses akses  phpMyAdmin pada alamat http://localhost:8081.

### 9. Hentikan Container
Untuk menghentikan dan menghapus semua container yang berjalan:
```bash
docker-compose down
```
Perintah ini akan menghentikan container PHP dan MySQL tanpa menghapus volume database.
