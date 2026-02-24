<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['username'] = $_POST['username'];
}
?>

<form method="POST">
    Username: <input type="text" name="username">
    <button type="submit">Save Session</button>
</form>

<a href="session_page.php">Go to Next Page</a>
