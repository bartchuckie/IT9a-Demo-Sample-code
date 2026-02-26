<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Transaction System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Basic Transaction Form</h2>

    <form class="transaction-form" method="POST" action="main.php">
    Item Name: <br>
    <input type="text" name="item" required><br><br>

    Price:<br>
    <input type="number" name="price" required><br><br>

    Quantity: <br>
    <input type="number" name="qty" required><br><br>

    <input type="submit" value="Process Transaction">
</form>

</div>

</body>
</html>