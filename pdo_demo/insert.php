<?php
require "db_pdo.php";

$sql = "INSERT INTO students (fullname, course) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute(["Juan Dela Cruz", "BSIT"]);

echo "Student inserted successfully!";
?>
