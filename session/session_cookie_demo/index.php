<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie & Session Demo - Page 1</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 { 
            color: #2c3e50; 
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
        }
        
        .form-section {
            background-color: #ecf0f1;
            border: 2px solid #34495e;
            border-radius: 5px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .form-section label {
            display: block;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .form-section input {
            width: 100%;
            padding: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .form-section input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        
        .form-section button {
            background-color: #27ae60;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .form-section button:hover {
            background-color: #229954;
        }
        
        .results-section {
            margin-bottom: 30px;
        }
        
        .result-box {
            border: 2px solid #34495e;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .result-header {
            background-color: #3498db;
            color: white;
            padding: 12px 15px;
            font-weight: bold;
            font-size: 16px;
        }
        
        .result-content {
            background-color: #ecf0f1;
            padding: 15px;
            line-height: 1.6;
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        table tr { border-bottom: 1px solid #bdc3c7; }
        table tr:last-child { border-bottom: none; }
        table td { 
            padding: 10px; 
            text-align: left;
        }
        table td:first-child {
            font-weight: bold;
            color: #2c3e50;
            width: 30%;
            background-color: #d5dbdb;
        }
        
        .status-active { color: #27ae60; font-weight: bold; }
        .status-lost { color: #e74c3c; font-weight: bold; }
        
        .navigation {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            border-top: 2px solid #bdc3c7;
            padding-top: 20px;
        }
        
        .nav-btn {
            padding: 12px 20px;
            border: 2px solid #3498db;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .nav-btn:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .nav-btn.danger {
            background-color: #e74c3c;
            border-color: #c0392b;
        }
        
        .nav-btn.danger:hover {
            background-color: #c0392b;
        }
        
        .no-data { 
            color: #999; 
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cookie & Session Demo - Page 1</h1>
    
    <div class="form-section">
        <form method="POST">
            <label for="username">Enter Your Name:</label>
            <input type="text" id="username" name="username" required placeholder="Type your name here...">
            <button type="submit">✓ Submit</button>
        </form>
    </div>

    <?php
    // -------- NO COOKIE & NO SESSION ----------
    if (isset($_POST['username'])) {
        $name = htmlspecialchars($_POST['username']);
        
        echo "<div class='results-section'>";
        
        // Without Cookie & Session
        echo "<div class='result-box'>";
        echo "<div class='result-header'> Without Cookie & Session</div>";
        echo "<div class='result-content'>";
        echo "<table>";
        echo "<tr><td>Input Value:</td><td><b>$name</b></td></tr>";
        echo "<tr><td>Status:</td><td><span class='status-lost'>DATA IS LOST</span></td></tr>";
        echo "<tr><td>Note:</td><td>Refresh or go to next page, and this data disappears</td></tr>";
        echo "</table>";
        echo "</div></div>";

        // -------- COOKIE ----------
        setcookie("user_cookie", $name, time() + 8600); // 1 hour

        echo "<div class='result-box'>";
        echo "<div class='result-header'> With Cookie</div>";
        echo "<div class='result-content'>";
        echo "<table>";
        echo "<tr><td>Cookie Name:</td><td>user_cookie</td></tr>";
        echo "<tr><td>Cookie Value:</td><td><b>$name</b></td></tr>";
        echo "<tr><td>Expiration:</td><td>1 hour from now (3600 seconds)</td></tr>";
        echo "<tr><td>Status:</td><td><span class='status-active'>✓ AVAILABLE</span></td></tr>";
        echo "<tr><td>Persistence:</td><td>Survives page refresh & browser close</td></tr>";
        echo "</table>";
        echo "</div></div>";

        // -------- SESSION ----------
        $_SESSION['user_session'] = $name;

        echo "<div class='result-box'>";
        echo "<div class='result-header'> With Session</div>";
        echo "<div class='result-content'>";
        echo "<table>";
        echo "<tr><td>Session Variable:</td><td>user_session</td></tr>";
        echo "<tr><td>Session Value:</td><td><b>$name</b></td></tr>";
        echo "<tr><td>Status:</td><td><span class='status-active'>✓ ACTIVE</span></td></tr>";
        echo "<tr><td>Persistence:</td><td>Available on next page while browser is open</td></tr>";
        echo "<tr><td>Note:</td><td>Lost after browser close or session timeout</td></tr>";
        echo "</table>";
        echo "</div></div>";
        
        echo "</div>";
    }
    ?>

    <div class="navigation">
        <a href="page2.php" class="nav-btn"> Go to Page 2</a>
        <a href="logout.php" class="nav-btn danger"> Destroy Cookie & Session</a>
    </div>
</div>

</body>
</html>
