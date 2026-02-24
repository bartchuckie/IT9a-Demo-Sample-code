<?php
// 1. Logic for POST (Form Submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // PHP creates the $_POST associative array:
    // ["username" => "Value", "email" => "Value"]
    $name = $_POST['username'];
    echo "<div style='color: green;'>POST Received: Profile updated for $name!</div>";
}

// 2. Logic for GET (URL parameters)
if (isset($_GET['status'])) {
    // PHP creates the $_GET associative array from the URL:
    // ["status" => "Value"]
    if ($_GET['status'] == 'success') {
        echo "<div style='color: blue;'>GET Received: Operation was successful.</div>";
    }
}

// 3. Logic for REQUEST (The "Catch-All")
if (isset($_REQUEST['id'])) {
    // Works whether 'id' is in the URL (?id=1) or in a POST form
    echo "Request ID: " . $_REQUEST['id'];
}
?>

<!DOCTYPE html>
<html>
<body>

    <h2>User Profile (POST Example)</h2>
    <form method="POST" action="index.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <input type="hidden" name="id" value="99"> <button type="submit">Save Profile</button>
    </form>

    <hr>

    <h2>System Actions (GET Example)</h2>
    <a href="index.php?status=success&id=99">Check System Status</a>

</body>
</html>