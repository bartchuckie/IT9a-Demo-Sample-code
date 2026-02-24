<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        button {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .result {
            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
            border-left: 5px solid #667eea;
            padding: 25px;
            border-radius: 6px;
            margin-top: 30px;
        }

        .result h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .result div {
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }

        .result strong {
            color: #764ba2;
            font-size: 18px;
            display: block;
            margin-top: 10px;
        }
    </style>
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

    <?php
    if (isset($_POST['calculate'])) {

        $item = $_POST['item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
    
    if ($price <= 0) {
        echo "<div class='result'>";
        echo "<h3>Error</h3>";
        echo "<div>Price must be greater than zero.</div>";
        echo "</div>";
        exit;
    }

    if ($qty <= 0) {
        echo "<div class='result'>";
        echo "<h3>Error</h3>";
        echo "<div>Quantity must be greater than zero.</div>";
        echo "</div>";
        exit;
    }

        $total = $qty * $price;

        echo "<div class='result'>";
        echo "<h3>Transaction Summary</h3>";
        echo "Item: $item <br>";
        echo "Quantity: $qty <br>";
        echo "Price: ₱$price <br>";
        echo "<strong>Total Amount: ₱$total</strong>";
        echo "</div>";
    }
    ?>
</div>


</body>
</html>