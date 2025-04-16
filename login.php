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