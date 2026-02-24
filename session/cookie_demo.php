<?php
setcookie("user", "Jhun", time() + 3600); // 1 hour
echo "Cookie has been set";
?>

<?php
if (isset($_COOKIE['user'])) {
    echo "Welcome " . $_COOKIE['user'];
} else {
    echo "Cookie not found";
}
?>
