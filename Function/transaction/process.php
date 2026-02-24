<?php
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
    
}
?>

