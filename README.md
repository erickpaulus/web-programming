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
4. [Framework](#framework)
   - [Laravel](#laravel)
   - [Code Igniter](#code-igniter)
5. [Alat Pendukung](#alat-pendukung)
6. [Langkah-Langkah Belajar](#langkah-langkah-belajar)
7. [Membuat Proyek Web Sederhana](#membuat-proyek-web-sederhana)
8. [Bahan bacaan](#bahan-bacaan)
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
    
