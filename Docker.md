# Panduan Instalasi dan Menjalankan PHP & MySQL dalam Docker

Panduan ini menjelaskan cara mengatur lingkungan **PHP** dan **MySQL** menggunakan **Docker** dengan bantuan **Docker Compose**. Dengan Docker, Anda dapat membuat lingkungan yang konsisten tanpa perlu konfigurasi manual yang rumit di mesin lokal.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal:
1. <a href="https://docs.docker.com/get-docker/" target="_blank">Docker</a>
2. <a href="https://docs.docker.com/compose/install/" target="_blank">Docker Compose</a>

## Langkah-Langkah

### 1. Silakan clone repositori berikut

```bash
https://github.com/erickpaulus/web-programming.git
```

### 2. Buka  folder project
Anda akan melihat beberapa file configurasi dan contoh php

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

### 3. Jalankan Docker Compose
Jalankan layanan Docker dengan perintah berikut di direktori proyek Anda:
```bash
docker-compose up --build
```
Perintah ini akan:

- Unduh (download) image PHP dan MySQL dari Docker Hub.
- Menjalankan container PHP-Apache pada port 8080 dan MySQL pada port internal 3306.
- Membuat jaringan app-network untuk komunikasi antara container.

### 4. Akses Aplikasi
Buka browser Anda dan akses:
```bash
http://localhost:8080
```
Anda akan melihat pesan "Koneksi berhasil!" jika PHP berhasil terhubung ke database MySQL.

### 5. Mengelola MySQL
Anda bisa mengakses MySQL melalui container menggunakan perintah berikut:
```bash
docker exec -it mysql-db mysql -u root -p
```
Masukkan password rootpassword (yang telah Anda atur di docker-compose.yml).

### 6. Akses phpMyAdmin
cara akses akses  phpMyAdmin pada alamat 
```bash
http://localhost:8081
```
### 7. Hentikan Container
Untuk menghentikan dan menghapus semua container yang berjalan:

Perintah ini akan menghentikan container PHP dan MySQL, tanpa menghapus volume database.
```bash
docker-compose down
```

Perintah ini akan menghentikan container PHP dan MySQL, kemudian menghapus volume database.
```bash
docker-compose down -volume
```

