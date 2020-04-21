<?php
    session_start();

    if (isset($_SESSION['email'])) header("Location: Dashboard.php");
    else if (
        isset($_POST['email'], $_POST['pass'])
        && $_POST['email'] != ""
        && $_POST['pass'] != ""
    ) {
        require "authenticate.php";
    }
?>

<!doctype HTML>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- TODO: JS Validate -->
    <form action="Login.php" method="POST">
        <label for="email">Email: </label>
        <input id="email" name="email" type="email" value="<?=isset($_SESSION['newUser']) ? $_SESSION['newUser'] : ''?>">
        <br>
        <label for="pass">Password: </label>
        <input id="pass" name="pass" type="password">
        <br>
        <br>
        <a id="newAccount" href="NewAccount.php">Create Account</a>
        <input type="submit" name="submit" value="LOGIN">
    </form>
</body>
</html>