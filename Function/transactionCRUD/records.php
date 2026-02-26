<?php include 'process.php'; ?>
<?php
require 'db.php';


try {
    $stmt = $pdo->query('SELECT * FROM transactions ORDER BY id DESC');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = $e->getMessage();
    $rows = [];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Transactions</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { padding:8px 10px; border:1px solid #ccc; text-align:left; }
        th { background:#f4f4f4; }
    </style>
</head>
<body>

<div class="container">
    <h2>All Transactions</h2>

    <?php if (isset($error)): ?>
        <p style="color:red">Error: <?php echo htmlspecialchars($error); ?></p>
    <?php else: ?>
        <?php if (count($rows) === 0): ?>
            <p>No transactions found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <?php
                        $headers = array_keys($rows[0]);
                        foreach ($headers as $h) {
                            echo '<th>' . htmlspecialchars(ucfirst($h)) . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?php echo htmlspecialchars($cell); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="index.php">New Transaction</a> | <a href="main.php">Last Result</a></p>
</div>

</body>
</html>
