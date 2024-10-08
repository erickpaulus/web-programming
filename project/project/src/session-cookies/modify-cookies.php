<?php
// Start with PHP code to set the cookie before sending any HTML
$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 seconds = 1 day
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Check if the cookie is set
if (!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
<p><strong>Note:</strong> You might have to reload the page to see the new value of the cookie.</p>
</body>
</html>
