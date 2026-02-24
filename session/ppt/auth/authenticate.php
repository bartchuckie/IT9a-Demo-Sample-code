<?php
session_start();

// Hardcoded credentials (for demo only)
$valid_username = "admin";
$valid_password = "12345";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    // Create session
    $_SESSION['username'] = $username;
    $_SESSION['login_time'] = time();

    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
