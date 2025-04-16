<?php
// login.php

// Zpracování formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirect = $_GET['redirect'] ?? 'dashboard.php'; // NEBEZPEČNÉ!

    if ($username === 'admin' && $password === 'admin') {
        // ⚠️ NEBEZPEČNÉ: Open redirect bez validace cíle
        header("Location: $redirect");
        exit;
    } else {
        $error = 'Neplatné přihlašovací údaje.';
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
</head>
<body>
    <h2>Přihlášení</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php?<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
        <label>Uživatel: <input type="text" name="username"></label><br><br>
        <label>Heslo: <input type="password" name="password"></label><br><br>
        <input type="submit" value="Přihlásit se">
    </form>
</body>
</html>
