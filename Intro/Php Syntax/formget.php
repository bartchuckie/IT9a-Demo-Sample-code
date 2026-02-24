<!DOCTYPE html>
<html>
<head>
    <title>GET Form Example</title>
</head>
<body>

<h2>GET Method Form</h2>

<form method="GET" action="">
    Name: <input type="text" name="username"><br><br>
    Age: <input type="number" name="age"><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if(isset($_GET['username']) && isset($_GET['age'])) {
    $name = $_GET['username'];
    $age = $_GET['age'];

    echo "<h3>Form Data Received (GET)</h3>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Age: " . htmlspecialchars($age);
}
?>

</body>
</html>

