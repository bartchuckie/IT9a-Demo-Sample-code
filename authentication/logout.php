<?php
session_start();

// Remove all session variables
session_unset();

// Destroy session
session_destroy();

// Remove cookie
if (isset($_COOKIE['user_name'])) {
    setcookie("user_name", "", time() - 3600, "/");
}

// Redirect back to form
header("Location: form.php");
exit();
?>