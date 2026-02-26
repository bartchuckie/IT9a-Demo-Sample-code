<?php
require 'db.php';

/* =========================
   DELETE PROCESS
========================= */
if (isset($_POST['delete_id'])) {

    $delete_id = $_POST['delete_id'];

    if (is_numeric($delete_id)) {

        $stmt = $pdo->prepare("DELETE FROM transactions WHERE id = :id");
        $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: transaction.php");
        exit();
    }
}


/* =========================
   CREATE PROCESS
========================= */
if (isset($_POST['add'])) {

    $item = trim($_POST['item']);
    $price = trim($_POST['price']);
    $quantity   = trim($_POST['quantity']);

    if (!empty($item) && is_numeric($price) && is_numeric($quantity)) {

        $total = $price * $quantity;

        $stmt = $pdo->prepare("INSERT INTO transactions (item, price, quantity, total) 
                               VALUES (:item, :price, :quantity, :total)");

        $stmt->execute([
            ':item' => $item,
            ':price' => $price,
            ':quantity' => $quantity,
            ':total' => $total
        ]);

        header("Location: transaction.php");
        exit();
    } else {
        $error = "Please fill out all fields correctly.";
    }
}


/* =========================
   READ PROCESS
========================= */
$stmt = $pdo->query("SELECT * FROM transactions ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Single Page CRUD - Transactions</title>
    <style>
        body { font-family: Arial; padding:20px; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #ccc; padding:8px; }
        th { background:#f4f4f4; }
        form { margin-bottom:15px; }
        input { padding:6px; }
        button { padding:6px 10px; }
        .error { color:red; }
    </style>
</head>
<body>

<h2>Transaction System</h2>

<!-- =========================
     ADD FORM
========================= -->

<form method="POST">
    <input type="text" name="item" placeholder="Item Name" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button type="submit" name="add">Add Transaction</button>
</form>

<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

<!-- =========================
     TABLE DISPLAY
========================= -->

<table>
    <tr>
        <th>ID</th>
        <th>Item</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
    </tr>

    <?php if (count($rows) > 0): ?>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['item']) ?></td>
                <td><?= htmlspecialchars($row['price']) ?></td>
                <td><?= htmlspecialchars($row['quantity']) ?></td>
                <td><?= htmlspecialchars($row['total']) ?></td>
                <td>
                    <form method="POST" style="display:inline;"
                          onsubmit="return confirm('Delete this record?');">
                        <input type="hidden" name="delete_id"
                               value="<?= $row['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No transactions found.</td></tr>
    <?php endif; ?>

</table>

</body>
</html>