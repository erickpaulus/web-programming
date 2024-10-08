<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"]
. ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"]
. ".";

// modify session
echo "<br>------Modify session<br>\n";
$_SESSION["favcolor"] = "red";
$_SESSION["favanimal"] = "flower";
// Echo session variables after unset
echo "Favorite color is " . $_SESSION["favcolor"]
. ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"]
. ".";

// Hapus semua variabel sesi
session_unset();
echo "<br>-------After unset<br>\n";
// Echo session variables after unset
echo "Favorite color is " . $_SESSION["favcolor"]
. ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"]
. ".";

// // Hancurkan sesi
session_destroy();
echo "Favorite color is " . $_SESSION["favcolor"]
. ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"]
. ".";
// echo "<br> ---------- Sesi telah dihapus.<br>";
?>
</body>
</html>