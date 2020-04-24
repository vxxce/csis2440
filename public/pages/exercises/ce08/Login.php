<?php
session_start();

if (isset($_SESSION['email'])) header("Location: Dashboard.php");
else if (
  isset($_POST['email'], $_POST['pass'])
  && $_POST['email'] != ""
  && $_POST['pass'] != ""
) require "authenticate.php";
?>

<!doctype HTML>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <form action="Login.php" method="POST" class="modal true">
    <h2 class="form-header">Login</h1>
      <p class="error <?= isset($_SESSION['loginError']) ? 'login-error' : '' ?>">
        <?= isset($_SESSION['loginError']) ? $_SESSION['loginError'] : '' ?>
      </p>
      <div id="email-group" class="form-group">
        <label for="email">Email: </label>
        <input id="email" name="email" type="email" value="
            <?= isset($_SESSION['newUser'])
              ? $_SESSION['newUser']
              : (isset($_POST["email"])
                ? $_POST['email']
                : '')
            ?>">
      </div>
      <div id="pass-group" class="form-group">
        <label for="pass">Password: </label>
        <input id="pass" name="pass" type="password">
      </div>
      <div id="action-group" class="form-group">
        <a id="newAccount" href="NewAccount.php">Create Account</a>
        <button type="submit" name="submit" class="submit">LOGIN</button>
      </div>
  </form>
</body>

</html>

<?php

unset($_SESSION['loginError'], $_SESSION['newUser']);
