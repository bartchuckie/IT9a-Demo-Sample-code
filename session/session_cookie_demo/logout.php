<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Destroy cookie
setcookie("user_cookie", "", time() - 3600);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Cookie & Session Demo</title>
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
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        h1 { 
            color: #27ae60; 
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .success-icon { 
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        .status-table {
            border: 2px solid #34495e;
            border-radius: 5px;
            overflow: hidden;
            margin: 30px 0;
        }
        
        .status-header {
            background-color: #27ae60;
            color: white;
            padding: 15px;
            font-weight: bold;
            font-size: 18px;
        }
        
        .status-content {
            background-color: #ecf0f1;
            padding: 20px;
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        table tr { border-bottom: 1px solid #bdc3c7; }
        table tr:last-child { border-bottom: none; }
        table td { 
            padding: 12px; 
            text-align: left;
        }
        table td:first-child {
            font-weight: bold;
            color: #2c3e50;
            width: 40%;
            background-color: #d5dbdb;
        }
        
        .status-active { 
            color: #27ae60; 
            font-weight: bold;
            font-size: 16px;
        }
        
        .info-text {
            color: #555;
            line-height: 1.8;
            margin: 20px 0;
            font-size: 15px;
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
            padding: 12px 30px;
            border: 2px solid #3498db;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 16px;
        }
        
        .nav-btn:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-icon">✓</div>
    <h1>Cleanup Complete</h1>
    
    <div class="status-table">
        <div class="status-header"> Session & Cookie Status</div>
        <div class="status-content">
            <table>
                <tr>
                    <td>Session:</td>
                    <td><span class="status-active"> DESTROYED</span></td>
                </tr>
                <tr>
                    <td>Cookie (user_cookie):</td>
                    <td><span class="status-active"> DELETED</span></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><span class="status-active"> ALL DATA CLEARED</span></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="info-text">
        <p><strong>What was done:</strong></p>
        <p>✓ All session variables have been unset<br>
           ✓ Session has been destroyed<br>
           ✓ Cookie 'user_cookie' has been expired and removed</p>
    </div>
    
    <div class="navigation">
        <a href="index.php" class="nav-btn"> Start Demo Again</a>
    </div>
</div>

</body>
</html>
