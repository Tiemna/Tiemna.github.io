<?php
// Optional: simulate session check (not required for your demo)
// session_start();
// if (!isset($_SESSION['logged_in'])) {
//     header("Location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .dashboard-box {
            background: white;
            padding: 30px;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="dashboard-box">
        <h1>Welcome to the Dashboard!</h1>
        <p>You have successfully logged in.</p>
        <p>This is a mock dashboard page used for demo purposes.</p>
        <a href="login.php">Log out</a>
    </div>
</body>
</html>
