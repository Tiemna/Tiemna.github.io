<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (auth($_POST['email'], $_POST['password'])){
        header('Location: '.$_POST['redirect_url']);
    } else {
        header("Location: /login.php?error=Incorrect%20Login.");
    }
} else {
?>

<form>
<form method="post">
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="hidden" name="redirect_url" value="<?= (isset($_GET["redirect_url"]) ? htmlspecialchars($_GET["redirect_url"]) : "/login.php"); ?>">
    <button type="submit" formmethod="post" formaction="/login.php">Submit</button>
</form>

<?php
}

?>