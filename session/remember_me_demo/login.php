<?php
// Initialize variable
$savedUsername = "";

// If cookie exists, get its value
if (isset($_COOKIE['username'])) {
    $savedUsername = $_COOKIE['username'];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Check if "Remember Me" is checked
    if (isset($_POST['remember'])) {
        setcookie("username", $username, time() + 86400, "/"); // 1 day
    } else {
        // If not checked, delete cookie if exists
        setcookie("username", "", time() - 3600, "/");
    }

    // Redirect after login
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remember Me Demo</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo htmlspecialchars($savedUsername); ?>" required><br><br>

    <input type="checkbox" name="remember"
    <?php if (isset($_COOKIE['username'])) echo "checked"; ?>>
    Remember Me<br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
