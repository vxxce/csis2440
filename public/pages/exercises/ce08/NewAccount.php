<?php
session_start();
print_r($_SESSION);
if (isset($_SESSION['email'])) header("Location: Dashboard.php");
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    // New account form submitted

    // TODO: PHP Validation
    // TODO: Sanitize input


    require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
    $pdo = new PDO($ce08_dsn, $ce08_un, $ce08_pw) or die("Could not connect");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['confirm'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    // Insert into DB
    $query = $pdo->prepare(
      "INSERT INTO ce08.captains (`name`, email, command, combat, commerce, cunning, pass)"
        . "VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $res = $query->execute([$name, $email, rand(25, 100), rand(25, 100), rand(25, 100), rand(25, 100), $hash]);
    if ($res == true) {
      $_SESSION["newUser"] = $email;
      header("Location: Login.php");
    }
  } else {
    // No new account submission yet, show form.
    print <<<HTML
      <form action="NewAccount.php" method="POST" class="modal true">
        <h2 class="form-header">Register</h1>
        <div id="name-group" class="form-group">
          <label for="name">Captain name: </label>
          <input type="text" name="name" id="name" required maxlength="100">
        </div>
        <p class="error"></p>
        <div id="email-group" class="form-group">
          <label for="email">Email: </label>
          <input type="email" name="email" id="email" required maxlength="300">
        </div>
        <p class="error"></p>
        <div id="password-group" class="form-group">
          <label for="password">Password: </label>
          <input type="password" name="password" id="password" required>
        </div>
        <div id="confirm-group" class="form-group">
          <label for="confirm">Confirm password: </label>
          <input type="password" name="confirm" id="confirm" required>
        </div>
        <p class="error"></p>
        <button class="submit" name="submit" id="submit" onclick="return isValid();">SUBMIT</button>
      </form>
      <script src="js/validateRegistration.js"></script>
  </body>
</html>
HTML;
  }
