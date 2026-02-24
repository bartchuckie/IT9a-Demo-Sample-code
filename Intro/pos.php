<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item
if (isset($_POST['add'])) {
    $item  = $_POST['item'];
    $qty   = (int)$_POST['qty'];
    $price = (float)$_POST['price'];

    if ($qty > 0 && $price > 0) {
        $_SESSION['cart'][] = [
            'item' => $item,
            'qty' => $qty,
            'price' => $price,
            'total' => $qty * $price
        ];
    }
    
    header("Location: pos.php");
    exit;
}


// Clear transaction
if (isset($_POST['clear'])) {
    session_destroy();
    header("Location: pos.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple POS</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background: #f2f2f2; }
        .container { width: 600px; margin: auto; }
        button { margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Simple POS Transaction</h2>

    <!-- INPUT FORM -->
    <form method="POST">
        <label>Item Name</label><br>
        <input type="text" name="item" required><br><br>

        <label>Quantity</label><br>
        <input type="number" name="qty" required><br><br>

        <label>Price</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <button type="submit" name="add">Add Item</button>
        <button type="submit" name="clear">Clear Transaction</button>
    </form>

    <!-- POS TABLE -->
    <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>

            <?php
            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $index => $row):
                $grandTotal += $row['total'];
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['item']) ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td>₱<?= number_format($row['price'], 2) ?></td>
                    <td>₱<?= number_format($row['total'], 2) ?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <th colspan="4">Grand Total</th>
                <th>₱<?= number_format($grandTotal, 2) ?></th>
            </tr>
        </table>
    <?php endif; ?>

</div>

</body>
</html>
