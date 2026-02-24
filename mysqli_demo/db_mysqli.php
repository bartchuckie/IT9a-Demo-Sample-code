<?php
$conn = new mysqli("localhost", "root", "", "school_mysqli");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
