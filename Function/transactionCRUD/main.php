<?php include 'process.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container summary">
    <h2>Transaction Summary</h2>

    <p><strong>Item:</strong> <?php echo $item; ?></p>
    <p><strong>Price:</strong> ₱<?php echo $price; ?></p>
    <p><strong>Quantity:</strong> <?php echo $qty; ?></p>
    <p><strong>Total Amount:</strong> <span class="amount">₱<?php echo $total ?></span></p>

    <a href="index.php">New Transaction</a> | <a href="records.php">View All Transactions</a>
</div>

</body>
</html>