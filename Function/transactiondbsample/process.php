<?php
//Ayaw kalimit ang pag-require sa db.php aron maka-access sa database connection
require 'db.php';


// User-defined function
function computeTotal($price, $quantity) {
    return $price * $quantity;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];



    // Call function
    $total = computeTotal($price, $qty);
    
    $sql = "INSERT INTO transactions (item, price, quantity, total)
    VALUES (:item, :price, :quantity, :total)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':quantity' => $qty,
        ':total' => $total
    ]);

}
?>

