# Panduan Belajar Pemrograman Web untuk Pemula

Repositori ini memuat panduan belajar pemrograman web untuk pemula! Panduan ini dirancang untuk membantu saya dan Anda memahami dasar-dasar pengembangan web, mulai dari HTML hingga menjalankan aplikasi web sederhana dengan server dan database.

## Daftar Isi
1. [Pengantar](#pengantar)
2. [Teknologi Dasar Client Side Scripting](#teknologi-dasar-client-side-scripting)
   - [HTML](#html)
   - [CSS](#css)
   - [JavaScript](#javascript)
3. [Alat yang Diperlukan](#alat-yang-diperlukan)
4. [Langkah-Langkah Belajar](#langkah-langkah-belajar)
5. [Membuat Proyek Web Sederhana](#membuat-proyek-web-sederhana)
6. [Tips Belajar dan Sumber Daya](#tips-belajar-dan-sumber-daya)

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
    <title>Halaman Web Pertama Saya</title>
</head>
<body>
    <h1>Selamat Datang!</h1>
    <p>Ini adalah halaman web pertama saya menggunakan HTML.</p>
</body>
</html>
```

### CSS
CSS (Cascading Style Sheets) adalah bahasa yang digunakan untuk menata tampilan halaman web yang dibuat dengan HTML. CSS mengontrol warna, tata letak, font, dan tampilan elemen-elemen web lainnya.

#### Contoh Kode CSS Sederhana:
```css
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

h1 {
    color: #333;
}

p {
    color: #666;
}
```
###JavaScript
JavaScript adalah bahasa pemrograman yang digunakan untuk membuat halaman web lebih interaktif dan dinamis. Dengan JavaScript, Anda bisa membuat animasi, validasi form, dan interaksi pengguna lainnya.

### Contoh Kode JavaScript Sederhana:
```javascript

document.addEventListener('DOMContentLoaded', function() {
    alert('Selamat datang di halaman web saya!');
});
```
```
function showTime() {
	document.getElementById('currentTime').innerHTML = new Date().toUTCString();
}
showTime();
setInterval(function () {
	showTime();
}, 1000);
```
