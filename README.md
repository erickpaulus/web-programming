# Panduan Belajar Pemrograman Web untuk Pemula

Repositori ini memuat panduan belajar pemrograman web untuk pemula! Panduan ini dirancang untuk membantu saya dan Anda memahami dasar-dasar pengembangan web, mulai dari HTML hingga menjalankan aplikasi web sederhana dengan server dan database.

## Daftar Isi
1. [Pengantar](#pengantar)
2. [Teknologi Dasar Client Side Scripting](#teknologi-dasar-client-side-scripting)
   - [HTML](#html)
   - [CSS](#css)
   - [JavaScript](#javascript)
3. [Teknologi Dasar Server Side Scripting](#teknologi-dasar-server-side-scripting)
   - [PHP](#php)
4. [Database](#database)
   - [MySQL](#mysql)
5. [Session dan Cookie](#session-dan-cookie)
6. [Framework](#framework)
   - [Laravel](#laravel)
   - [Code Igniter](#code-igniter)
7. [Alat Pendukung](#alat-pendukung)
8. [Langkah-Langkah Belajar](#langkah-langkah-belajar)
9. [Membuat Proyek Web Sederhana](#membuat-proyek-web-sederhana)
10. [Bahan bacaan](#bahan-bacaan)
---

## Pengantar

Pemrograman web berkaitan dengan proses pembuatan dan pemeliharaan situs web. Ini melibatkan berbagai teknologi dan keterampilan, mulai dari merancang tampilan (frontend) hingga memproses data di server (backend). Disini, kita belajar client side scripting untuk frontend dan server side scripting untuk backend serta alat-alat pendukung lainnya untuk pengembangan aplikasi web.

## Teknologi Dasar Client Side Scripting

### HTML
HTML (HyperText Markup Language) adalah bahasa markup yang digunakan untuk membuat struktur halaman web. HTML terdiri dari elemen-elemen yang membentuk teks, gambar, tautan, dan berbagai elemen lain pada halaman web.

#### Contoh Kode HTML Sederhana:
```html
<!DOCTYPE html>
<html>
<head>
    <title>Web Pertama</title>
</head>
<body>
    <h1>Horreeee!</h1>
    <p>Ini adalah halaman web pertama saya menggunakan HTML.</p>
</body>
</html>
```

### CSS
CSS (Cascading Style Sheets) adalah bahasa yang digunakan untuk menata tampilan halaman web yang dibuat dengan HTML. CSS mengontrol warna, tata letak, font, dan tampilan elemen-elemen web lainnya.

#### Contoh Kode CSS Sederhana:
Nama file: `styles.css`
```css
.title {
	color: #5C6AC4;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 25px;
}

h1 {
    color: #333;
}

p {
    color: #666;
}
```
### JavaScript
JavaScript adalah bahasa pemrograman yang mampu berjalan di client-side atau server-side untuk membuat halaman web lebih interaktif. JavaScript, HTML dan CSS adalah tiga sekawan, di mana HTML digunakan untuk struktur, CSS untuk gaya, dan JavaScript untuk fungsi dan interaksi.

Dengan JavaScript, kita dapat:
- Manipulasi DOM (Document Object Model): Mengubah konten atau struktur halaman secara dinamis.
- Validasi Form: Memeriksa input pengguna di formulir sebelum dikirim ke server.
- Interaksi Asynchronous (AJAX): Mengambil data dari server tanpa me-reload halaman.
- Pengaturan Event: Menangani scroll, klik, hover, dan interaksi pengguna lainnya.
- Animasi dan Efek Visual: Membuat elemen halaman bergerak atau bertransisi.

Berkat perkembangan ekosistem JavaScript, kita dapat  mengembangkan seluruh bagian aplikasi web hanya dengan menggunakan JavaScript. Ini dikenal sebagai pendekatan full-stack JavaScript.

Library/Framework Frontend Populer:
- React: Library yang dikembangkan oleh Facebook untuk membangun UI dinamis dengan pendekatan komponen.
- Vue.js: Framework progresif yang mudah diintegrasikan dengan proyek yang sudah ada untuk membangun antarmuka interaktif.
- Angular: Framework yang dikembangkan oleh Google untuk membuat aplikasi web berskala besar dengan pendekatan MVC.
- Backend (Server-side) dengan JavaScript: Dengan Node.js, JavaScript dapat digunakan di server. Node.js memungkinkan pengembangan server yang cepat dan ringan menggunakan JavaScript.

Framework Backend Populer:
- Express.js: Framework minimalis yang sering digunakan bersama Node.js untuk membangun API dan aplikasi web.
- Next.js: Framework berbasis React yang mendukung rendering sisi server dan API backend.
- NestJS: Framework backend yang berfokus pada skalabilitas dan efisiensi dengan struktur modular.

Database dengan JavaScript: 
- Beberapa database dapat diintegrasikan langsung dengan JavaScript di backend,
- Beberapa framework seperti Mongoose memungkinkan kita menggunakan database seperti MongoDB dengan mudah.
- Anda juga bisa menggunakan SQL databases (PostgreSQL, MySQL) melalui ORM (Object-Relational Mapping) seperti Sequelize.

Salah satu contoh stack populer untuk aplikasi full JavaScript adalah MERN:
- M: MongoDB (NoSQL database)
- E: Express.js (Framework backend Node.js)
- R: React.js (Library frontend)
- N: Node.js (Runtime JavaScript di server)

### Contoh Kode JavaScript Sederhana:
```javascript
document.addEventListener('DOMContentLoaded', function() {
    alert('Selamat datang di halaman web saya!');
});
```
Nama file: `script.js`
```
function showTime() {
	document.getElementById('currentTime').innerHTML = new Date().toUTCString();
}
showTime();
setInterval(function () {
	showTime();
}, 1000);
```
### Contoh kombinasi HTML-CSS-Javascript
Nama file: `index.html`
```
<!DOCTYPE html>
<html>
  <head>
    <title>Hello, World!</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
      <h1 class="title">Hello World! </h1>
      <p id="currentTime"></p>
      <script src="script.js"></script>
  </body>
</html>
```

### PHP
PHP (Hypertext Preprocessor) adalah bahasa pemrograman server-side untuk pengembangan web. Dengan PHP, halaman web dapat dikelolah secara lebih dinamis.  PHP mengolah data di server, kemudian mengirimkan hasilnya ke browser pengguna dalam bentuk HTML.

Fungsi utama PHP dalam pengembangan web:
- Pengolahan Formulir: Memproses input yang dikirim pengguna melalui form HTML.
- Interaksi dengan Database: Menghubungkan, mengambil, dan menyimpan data di database seperti MySQL.
- Konten Dinamis: Menghasilkan konten yang berubah berdasarkan input atau kondisi tertentu.
- Manajemen Session: Menyimpan informasi pengguna seperti login.
- Integrasi dengan HTML: PHP mudah diintegrasikan ke dalam HTML untuk menambahkan logika server-side ke halaman web

## Session dan Cookie
Session dan Cookie merupkan dua metode yang berfungsi untuk menampung informasi tentang pengguna dalam suatu aplikasi web di PHP. Kedua metode ini sering digunakan bersamaan, namun perbedaan utama di antara keduanya adalah cara penyimpanan dan penggunaannya.

1. Session di PHP
Session adalah mekanisme penyimpanan data yang bersifat sementara untuk melacak data pengguna selama mereka mengunjungi situs. Informasi ini disimpan di server, dan setiap pengguna memiliki ID sesi unik yang disimpan dalam cookie di sisi klien.

Cara Kerja:
- Ketika pengguna pertama kali mengunjungi situs, PHP membuat session ID yang unik.
- Session ID ini dikirim ke pengguna dalam bentuk cookie yang disebut PHPSESSID.
- Informasi spesifik pengguna disimpan di server berdasarkan session ID ini.
- Selama kunjungan, setiap request dari pengguna akan mencocokkan session ID ini untuk mengakses data yang disimpan.

Pentingnya Session:
- Data disimpan di server, sehingga lebih aman dibandingkan menyimpan data di sisi klien.
- Session bisa menyimpan data yang kompleks seperti array dan objek.
- Berguna untuk menyimpan data sementara seperti login status, keranjang belanja, atau preferensi pengguna.

Hal yang Perlu Diperhatikan:
- Keamanan: Karena session ID disimpan di cookie, pastikan tidak ada serangan session hijacking atau session fixation.
- Timeout Session: Pastikan mengatur masa aktif sesi agar tidak menyimpan data terlalu lama.
- Inisialisasi Session: Gunakan session_start() di awal script PHP sebelum output HTML untuk memulai session.

## Alat Pendukung
Beberapa alat yang diperlukan untuk membantu pengembangan web:

- Teks Editor: Notepad++, Sublime Text, Visual Studio Code, atau Atom.
- Browser Web: Chrome, Firefox, Opera, atau Edge.
- Server Lokal (opsional): XAMPP, LAMPP, WAMP,
- Docker untuk menjalankan server lokal jika diperlukan untuk proyek backend. [Panduan](https://github.com/erickpaulus/web-programming/blob/main/Docker.md)

## Langkah-Langkah Belajar
1. Belajar HTML: Mulailah dengan mempelajari elemen-elemen dasar HTML seperti heading, paragraf, tautan, tabel, dan formulir.
2. Belajar CSS: Setelah menguasai HTML, pelajari CSS untuk menata tampilan situs web Anda.
3. Belajar JavaScript: Gunakan JavaScript untuk menambahkan interaksi dan dinamika pada situs web.
4. Belajar Server-side Programming: Setelah menguasai frontend, mulailah belajar bahasa backend seperti PHP, Node.js, atau Python untuk membangun aplikasi web dinamis.
5. Belajar framework PHP seperti Code Igniter dan Laravel

## Bahan bacaan:
1. Online
   - MDN Web Docs
   - W3Schools
   - freeCodeCamp
2. Bergabung dengan komunitas: Bergabunglah dengan forum atau komunitas online seperti Stack Overflow, GitHub, atau forum lokal untuk belajar dan berbagi pengalaman.

<a href="https://visitorbadge.io/status?path=https%3A%2F%2Fgithub.com%2Ferickpaulus%2F"><img src="https://api.visitorbadge.io/api/visitors?path=https%3A%2F%2Fgithub.com%2Ferickpaulus%2F&label=VISITORS&countColor=%23263759" /></a>
    
