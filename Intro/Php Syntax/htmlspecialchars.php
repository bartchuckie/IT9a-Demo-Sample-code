<!DOCTYPE html>
<html>
<body>

<h2>Without htmlspecialchars()</h2>

<form method="POST">
    Enter Name: <input type="text" name="username">
    <input type="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Hello " . $_POST['username'];
}
?>

<h2>With htmlspecialchars()</h2>

<form method="POST">
    Enter Name: <input type="text" name="username">
    <input type="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $safeName = htmlspecialchars($_POST['username']);
    echo "Hello " . $safeName;
}
?>

</body>
</html>

