<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: read.php");
?>