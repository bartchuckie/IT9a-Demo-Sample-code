<?php
session_start();

// Protect page using SESSION
if (!isset($_SESSION['user_session'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to Dashboard</h2>

<h3>SESSION Data (Server-side)</h3>
<p>
    <?php
    echo "Session Username: " . $_SESSION['user_session'];
    ?>
</p>

<h3>COOKIE Data (Client-side)</h3>
<p>
    <?php
    if (isset($_COOKIE['user_cookie'])) {
        echo "Cookie Username: " . $_COOKIE['user_cookie'];
    } else {
        echo "No cookie found";
    }
    ?>
</p>

<hr>

<h3>Important Teaching Points</h3>
<ul>
    <li>Refresh the page → session still exists</li>
    <li>Close browser → session may end</li>
    <li>Cookie exists until expiration time</li>
</ul>

<a href="logout.php">Logout</a>

</body>
</html>
