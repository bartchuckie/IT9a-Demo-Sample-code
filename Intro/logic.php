<?php   
if (isset($_POST['calculate'])) {

        $item = $_POST['item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];

        $total = $qty * $price;
}

?>