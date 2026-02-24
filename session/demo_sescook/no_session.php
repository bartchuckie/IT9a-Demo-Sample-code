<!DOCTYPE html>
<html>
<head>
    <title>No Session Demo</title>
</head>
<body>

<h2>No Session Demo</h2>

<form method="POST">
    Username: <input type="text" name="username">
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_POST['username'])) {
    echo "<p>Welcome, " . $_POST['username'] . "</p>";
    echo "<p> Not stored in session</p>";
    echo "<p> Refresh page → data gone</p>";
}
?>

<p>No session = no user tracking</p>

<a href="login.php">Back</a>

</body>
</html>
