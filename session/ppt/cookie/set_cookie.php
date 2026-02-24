<?php
//Setting a cookie:
//setcookie(name, value, expire, path, domain, secure, httponly);

setcookie("username", "Jhun", time() + 3600, "/");
echo "Cookie has been set!";


//deleting a cookie:
//setcookie("username", "", time() - 3600, "/");
?>
