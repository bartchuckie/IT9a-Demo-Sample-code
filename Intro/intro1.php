 <?php include 'logic.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Simple Sales Transaction</h2>

    <form method="POST">
        <label>Item Name</label>
        <input type="text" name="item" required>

        <label>Quantity</label>
        <input type="number" name="qty" required>

        <label>Price</label>
        <input type="number" name="price" required>

        <button type="submit" name="calculate">Calculate</button>
    </form>
    
    <?php include 'view.php'; ?>
        
</div>


</body>
</html>