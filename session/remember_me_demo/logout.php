<?php
// Destroy cookie
setcookie("username", "", time() - 3600, "/");

// Redirect back to login
header("Location: login.php");
exit();
?>
