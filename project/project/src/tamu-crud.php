<?php
// Konfigurasi koneksi ke database
$servername = "db";
$username = "user";
$password = "password";
$dbname = "mydatabase";

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyisipkan Data
if (isset($_POST['insert'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disisipkan.<br>";
    } else {
        echo "Gagal menyisipkan data: " . $conn->error . "<br>";
    }
}

// Memperbarui Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];

    $sql = "UPDATE Users SET lastname='$lastname' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui.<br>";
    } else {
        echo "Gagal memperbarui data: " . $conn->error . "<br>";
    }
}

// Menghapus Data
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM Users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.<br>";
    } else {
        echo "Gagal menghapus data: " . $conn->error . "<br>";
    }
}

// Menampilkan Data
$sql = "SELECT id, firstname, lastname, email FROM Users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>
<body>
    <h1>CRUD PHP - Users</h1>

    <!-- Formulir untuk Menyisipkan Data -->
    <h2>Insert Data</h2>
    <form method="post" action="">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="insert">Insert</button>
    </form>

    <!-- Menampilkan Data -->
    <h2>Data Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <form method='post' action='' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='text' name='lastname' value='{$row['lastname']}' placeholder='Last Name' required>
                                <button type='submit' name='update'>Update</button>
                            </form>
                            <form method='post' action='' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' name='delete' onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Menutup Koneksi
$conn->close();
?>
