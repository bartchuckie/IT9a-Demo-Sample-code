<?php
require "db_pdo.php";

$stmt = $conn->query("SELECT * FROM students");

while ($row = $stmt->fetch()) {
    echo $row['id'] . " - " . $row['fullname'] . " - " . $row['course'] . "<br>";
}
?>
