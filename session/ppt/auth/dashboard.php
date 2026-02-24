<?php
session_start();

// Protect page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
<p>Login Time: <?php echo date("Y-m-d H:i:s", $_SESSION['login_time']); ?></p>

<a href="logout.php">Logout</a>

</body>
</html>
