<?php
// No cookie is created here
?>

<!DOCTYPE html>
<html>
<head>
    <title>No Cookie Demo</title>
</head>
<body>

<h2>No Cookie Demo</h2>

<form method="POST">
    Enter Name: <input type="text" name="name">
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_POST['name'])) {
    echo "<p>Hello, " . $_POST['name'] . "</p>";
    echo "<p>🔄 Refresh the page — data disappears!</p>";
}
?>

<p>No cookie = no persistence</p>

<a href="login.php">Back</a>

</body>
</html>
