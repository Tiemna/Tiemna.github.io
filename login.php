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
        header("Location: /login.php?error=Incorrect%20Login.");
        exit;
    }
} else {
    // Show login form
?>