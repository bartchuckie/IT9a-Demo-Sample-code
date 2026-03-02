<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(16,24,40,0.08);
            width: 360px;
        }
        h1 {
            margin: 0 0 12px 0;
            font-size: 18px;
            color: #0f172a;
        }
        .txn-form label {
            display: block;
            margin: 10px 0 6px 0;
            font-size: 13px;
            color: #0b1220;
            font-weight: 600;
        }
        .txn-form input[type="text"],
        .txn-form input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d7e0ee;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            background: #fbfdff;
        }
        .txn-form button {
            margin-top: 14px;
            width: 100%;
            padding: 10px 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 14px;
        }
        .txn-form button:hover { background: #1e4fd8; }
        .view-link {
            display: block;
            text-align: center;
            margin-top: 12px;
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
        }
        .view-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Transaction</h1>
        <form class="txn-form" method="post" action="create.php">
            <label for="item">Item</label>
            <input id="item" type="text" name="item" required>

            <label for="price">Price</label>
            <input id="price" type="number" name="price" step="0.01" required>

            <label for="qty">Quantity</label>
            <input id="qty" type="number" name="qty" required>

            <button type="submit">Save</button>
        </form>
        <a class="view-link" href="read.php">View Transactions</a>
    </div>

</body>
</html>