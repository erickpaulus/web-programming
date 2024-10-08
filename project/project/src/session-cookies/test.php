<?php
// Clear the $_COOKIE array for testing purposes
$_COOKIE = array(); // This will simulate that no cookies are present
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<!DOCTYPE html>

<html>
<body>
<?php
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}


?>
</body>
</html>
