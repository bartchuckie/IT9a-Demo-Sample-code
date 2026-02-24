<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Basic validation
    if (empty($name) || empty($email)) {
        $error = "All fields are required!";
    } else {
        // Store data in SESSION
        $_SESSION['name']  = $name;
        $_SESSION['email'] = $email;

        // Store data in COOKIE (name only)
        setcookie("user_name", $name, time() + 3600, "/");

        // Redirect to protected page
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Authentication - Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Login Form</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>