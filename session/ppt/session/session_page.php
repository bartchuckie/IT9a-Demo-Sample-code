<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'];
} else {
    echo "No session found!";
}
?>

<a href="session_logout.php">Logout</a>
