<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE username = '$username' 
        AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Login successful!";
} else {
    echo "Invalid login.";
}
?>
