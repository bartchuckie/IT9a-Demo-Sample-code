<!DOCTYPE html>
<html>
<head>
    <title>POST Form Example</title>
</head>
<body>

<h2>POST Method Form</h2>

<form method="POST" action="">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "<h3>Form Data Received (POST)</h3>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password);
}
?>

</body>
</html>
