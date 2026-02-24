<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simple demo validation
if ($username === 'admin' && $password === '1234') {

    // COOKIE (Client-side)
    setcookie("user_cookie", $username, time() + 3600); // 1 hour

    // SESSION (Server-side)
    $_SESSION['user_session'] = $username;

    header("Location: dashboard.php");
    exit();
} else {
    echo "<h3>Invalid login</h3>";
    echo "<a href='login.php'>Go back</a>";
}
