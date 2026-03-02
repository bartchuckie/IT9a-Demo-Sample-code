<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;

    $sql = "UPDATE items
            SET item=:item, price=:price, qty=:qty, total=:total
            WHERE id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total,
        ':id' => $id
    ]);

    header("Location: read.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="transaction-card">
    <h2>Update Transaction</h2>
    
    <form method="post">
        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="item" value="<?= htmlspecialchars($data['item']) ?>" required>
        </div>

        <div class="form-group">
            <label>Price ($)</label>
            <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required>
        </div>

        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="qty" value="<?= $data['qty'] ?>" required>
        </div>

        <button type="submit">Update Transaction</button>
    </form>
    
    <a href="read.php" class="back-link">← Back to List</a>
</div>
</body>
</html>
