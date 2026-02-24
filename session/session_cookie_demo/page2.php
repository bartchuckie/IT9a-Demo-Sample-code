<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie & Session Demo - Page 2</title>
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
            min-height: 60px;
            display: flex;
            align-items: center;
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse;
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
            width: 35%;
            background-color: #d5dbdb;
        }
        
        .status-active { color: #27ae60; font-weight: bold; }
        .status-none { color: #e74c3c; font-weight: bold; }
        .status-warning { color: #f39c12; font-weight: bold; }
        
        .no-data { 
            color: #999; 
            font-style: italic;
            text-align: center;
        }
        
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
    </style>
</head>
<body>

<div class="container">
    <h1> Cookie & Session Demo – Page 2</h1>

    <div class="result-box">
        <div class="result-header"> Without Cookie & Session</div>
        <div class="result-content">
            <table>
                <tr>
                    <td>Status:</td>
                    <td><span class="status-none">✗ NO DATA AVAILABLE</span></td>
                </tr>
                <tr>
                    <td>Note:</td>
                    <td>Data from Page 1 is completely LOST. No mechanism to store data.</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="result-box">
        <div class="result-header"> With Cookie</div>
        <div class="result-content">
            <?php
            if (isset($_COOKIE['user_cookie'])) {
                echo "<table>";
                echo "<tr><td>Cookie Name:</td><td>user_cookie</td></tr>";
                echo "<tr><td>Cookie Value:</td><td><b>" . htmlspecialchars($_COOKIE['user_cookie']) . "</b></td></tr>";
                echo "<tr><td>Status:</td><td><span class='status-active'>✓ ACCESSIBLE</span></td></tr>";
                echo "<tr><td>Behavior:</td><td>Cookie survives page navigation, browser refresh, and even browser close (until expiration)</td></tr>";
                echo "</table>";
            } else {
                echo "<div class='no-data'> No Cookie Found.<br>Cookie not set on Page 1 or has expired.</div>";
            }
            ?>
        </div>
    </div>

    <div class="result-box">
        <div class="result-header"> With Session</div>
        <div class="result-content">
            <?php
            if (isset($_SESSION['user_session'])) {
                echo "<table>";
                echo "<tr><td>Session Variable:</td><td>user_session</td></tr>";
                echo "<tr><td>Session Value:</td><td><b>" . htmlspecialchars($_SESSION['user_session']) . "</b></td></tr>";
                echo "<tr><td>Status:</td><td><span class='status-active'>✓ ACTIVE</span></td></tr>";
                echo "<tr><td>Behavior:</td><td>Session remains available while browser is open. Lost after browser close or timeout.</td></tr>";
                echo "</table>";
            } else {
                echo "<div class='no-data'> Session Not Found.<br>Session not set on Page 1 or expired.</div>";
            }
            ?>
        </div>
    </div>

    <div class="navigation">
        <a href="index.php" class="nav-btn">⬅️ Back to Page 1</a>
        <a href="logout.php" class="nav-btn danger">🚪 Destroy Cookie & Session</a>
    </div>
</div>

</body>
</html>
