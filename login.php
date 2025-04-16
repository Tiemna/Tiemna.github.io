<?php

function auth($email, $password) {
    return $email === 'admin' && $password === 'admin';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (auth($_POST['email'], $_POST['password'])) {
        // ⚠️ Vulnerable open redirect (no validation!)
        header('Location: ' . $_POST['redirect_url']);
        exit;
    } else {
        header("Location: login.php?error=Incorrect%20Login.");
        exit;
    }
} else {
    // Show login form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page (Open Redirect Demo)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .login-box {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <label>Email:</label><br>
            <input type="text" name="email" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="hidden" name="redirect_url" value="<?= (isset($_GET["redirect_url"]) ? htmlspecialchars($_GET["redirect_url"]) : "dashboard.php"); ?>">

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<?php
}
?>
