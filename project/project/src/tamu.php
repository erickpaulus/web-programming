<?php
// Konfigurasi koneksi ke database

$servername = "db";
$username = "user";
$password = "password";
$dbname = "mydatabase";

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Membuat Database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat.<br>";
} else {
    echo "Gagal membuat database: " . $conn->error . "<br>";
}

// Menghubungkan ke database yang sudah dibuat
$conn->select_db($dbname);

// Membuat Tabel
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabel Users berhasil dibuat.<br>";
} else {
    echo "Gagal membuat tabel: " . $conn->error . "<br>";
}

// Menyisipkan Data ke Tabel
$sql = "INSERT INTO Users (firstname, lastname, email) 
VALUES ('John', 'Doe', 'john@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disisipkan ke tabel Users.<br>";
} else {
    echo "Gagal menyisipkan data: " . $conn->error . "<br>";
}

// Menampilkan Data dari Tabel
$sql = "SELECT id, firstname, lastname, email FROM Users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Data dari tabel Users:<br>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "Tidak ada data di tabel Users.<br>";
}

// Memperbarui Data
$sql = "UPDATE Users SET lastname='Smith' WHERE firstname='John'";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diperbarui.<br>";
} else {
    echo "Gagal memperbarui data: " . $conn->error . "<br>";
}

// Menghapus Data
$sql = "DELETE FROM Users WHERE firstname='John'";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus.<br>";
} else {
    echo "Gagal menghapus data: " . $conn->error . "<br>";
}

// Menutup Koneksi
$conn->close();
?>
