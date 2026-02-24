<?php
// Stateless POS example that does NOT use PHP sessions.
// It keeps the current cart in a hidden JSON `cart` field so each POST carries the
// full transaction state (suitable for small/demo usage).

// We'll log all submissions to a local JSON file so we can demonstrate
// that without sessions or PRG, reloading/resubmitting will duplicate entries.
$logFile = __DIR__ . '/pos_nosession_log.json';

// helper
function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// load existing log
$entries = [];
if (is_file($logFile)) {
    $text = file_get_contents($logFile);
    $decoded = json_decode($text, true);
    if (is_array($decoded)) $entries = $decoded;
}

// Add item (no session used anywhere)
if (isset($_POST['add'])) {
    $item  = trim($_POST['item'] ?? '');
    $qty   = (int)($_POST['qty'] ?? 0);
    $price = (float)($_POST['price'] ?? 0);

    if ($item !== '' && $qty > 0 && $price > 0) {
        $entries[] = [
            'item' => $item,
            'qty' => $qty,
            'price' => $price,
            'total' => $qty * $price,
            'time' => date('c')
        ];
        // persist
        file_put_contents($logFile, json_encode($entries, JSON_PRETTY_PRINT));
    }
}

// Clear all logged transactions
if (isset($_POST['clear'])) {
    $entries = [];
    @unlink($logFile);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>POS (No Session)</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 700px; margin: 24px auto; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #f5f5f5; }
        label { display:block; margin-top:8px; }
        input[type=text], input[type=number] { width:100%; padding:6px; box-sizing:border-box; }
        .actions { margin-top:12px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Simple POS — No Session</h2>

    <form method="POST">
        <label>Item Name
            <input type="text" name="item" required>
        </label>

        <label>Quantity
            <input type="number" name="qty" min="1" required>
        </label>

        <label>Price
            <input type="number" name="price" step="0.01" min="0.01" required>
        </label>

        <!-- Carry the cart state in a hidden JSON field -->
        <input type="hidden" name="cart" value="<?= h(json_encode($cart, JSON_HEX_APOS|JSON_HEX_QUOT)) ?>">

        <div class="actions">
            <button type="submit" name="add">Add Item</button>
            <button type="submit" name="clear">Clear Transaction</button>
        </div>
    </form>

    <?php if (!empty($cart)): ?>
        <table>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <?php $grand = 0; foreach ($cart as $i => $row): $grand += $row['total']; ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= h($row['item']) ?></td>
                    <td><?= (int)$row['qty'] ?></td>
                    <td><?= number_format($row['price'], 2) ?></td>
                    <td><?= number_format($row['total'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="4">Grand Total</th>
                <th><?= number_format($grand, 2) ?></th>
            </tr>
        </table>
    <?php endif; ?>

   
</body>
</html>
