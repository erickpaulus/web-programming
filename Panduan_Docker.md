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
mkdir project
cd project
```
lalu buat struktur direktori sebagai berikut ini:
```bash
project/
│
├── docker-compose.yml
├── Dockerfile
├── public/
│   └── index.php
└── mydatabase/
    └── init.sql
```
### 2. Buat Dockerfile
```bash
# Use the official PHP Apache image
FROM php:8.1-apache

# Change the working directory to /var/www/html/public
WORKDIR /var/www/html/public

# Copy all files from the local public directory to the container's /var/www/html/public directory
COPY ./public /var/www/html/public

# Enable required PHP extensions for MySQL
RUN docker-php-ext-install mysqli

# Expose port 80 for Apache
EXPOSE 80

```

### 3. Buat docker-compose.yml
```bash
version: '3.8'

services:
  web:
    build: .
    ports:
      - "8080:80"
    depends_on:
      - db
    volumes:
      - ./public:/var/www/html/public  # Mount the public folder inside the container

  db:
    image: mysql:5.7
    ports:
      - "3307:3306"
    environment:
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_DATABASE: mydatabase
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    volumes:
      - db_data:/var/lib/mysql
      - ./mydatabase/init.sql:/docker-entrypoint-initdb.d/init.sql

volumes:
  db_data:

```
### 4. Buat File index.php
Buat file index.php di dalam direktori src/ dengan konten berikut:
```bash
<?php
$servername = "db";
$username = "user";
$password = "password";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// Create table if it does not exist
$table_creation_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

if ($conn->query($table_creation_sql) === TRUE) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Query to get data
$sql = "SELECT id, name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
```

### 5. Buat init.sql
```bash
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO users (name) VALUES ('John Doe'), ('Jane Doe');
```
### 6. Jalankan Docker Compose
Jalankan layanan Docker dengan perintah berikut di direktori proyek Anda:
```bash
docker-compose up --build
```
Perintah ini akan:

- Unduh (download) image PHP dan MySQL dari Docker Hub.
- Menjalankan container PHP-Apache pada port 8080 dan MySQL pada port internal 3306.
- Membuat jaringan app-network untuk komunikasi antara container.
### 7. Akses Aplikasi
Buka browser Anda dan akses:
```bash
http://localhost:8080
```
Anda akan melihat pesan "Koneksi berhasil!" jika PHP berhasil terhubung ke database MySQL.

### 8. Mengelola MySQL
Anda bisa mengakses MySQL melalui container menggunakan perintah berikut:
```bash
docker exec -it mysql-db mysql -u root -p
```
Masukkan password rootpassword (yang telah Anda atur di docker-compose.yml).

### 9. Tambah phpMyAdmin
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

### 10. Hentikan Container
Untuk menghentikan dan menghapus semua container yang berjalan:
```bash
docker-compose down
```
Hapus database
```bash
docker-compose down -volume
```
Perintah ini akan menghentikan container PHP dan MySQL tanpa menghapus volume database.
