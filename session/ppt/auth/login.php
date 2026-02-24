<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST" action="authenticate.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Invalid username or password</p>";
}
?>

</body>
</html>
