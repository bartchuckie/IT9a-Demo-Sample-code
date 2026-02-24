<?php
require "db_mysqli.php";

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {
    echo $row['id'] . " - " . $row['fullname'] . " - " . $row['course'] . "<br>";
}
?>
