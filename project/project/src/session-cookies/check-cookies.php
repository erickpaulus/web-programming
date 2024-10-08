<?php
// setcookie("test_cookie", "test", time() + 3600, '/');

// Buat cookie yang akan segera kadaluarsa (dihapus)
// setcookie("test_cookie", "test", time() - 3600, '/'); // Set cookie dengan waktu kadaluarsa di masa lalu
setcookie("user", "", time() - 3600, '/'); // Set cookie dengan waktu kadaluarsa di masa lalu
?>
<!DOCTYPE html>

<html>
<body>
<?php
if(count($_COOKIE) > 1) {
echo "Cookies are enabled.";
} else {
echo "Cookies are disabled.";
}
?>
</body>
</html>