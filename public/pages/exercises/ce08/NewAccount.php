
<?php
session_start();
if (isset($_SESSION['loggedIn'])) header("Location: Dashboard.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

  <?php
  if (!isset($_SESSION['errors'])) {
    if (isset($_POST['submit'])) {
      require_once "scripts/validateRegistration.php";

      $name = $_POST['name'];
      $email = $_POST['email'];
      $confirm = $_POST['confirm'];
      $pass = $_POST['password'];

      $errors = [];
      if (!$isAlpha($name)) $errors[] = "Name may only include characters A-Z";
      if (!$isValidLength($name, 0, 100)) $errors[] = "Name must be between 0 and 100 characters.";
      if (!$isValidEmail($email)) $errors[] = "Email is invalid";
      if ($pass !== $confirm) $errors[] = 'Passwords do not match.';
      if (!$meetsPasswordRequirements($pass, "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/")) {
        $errors[] = "Password must have 8+ characters including one numeric, one uppercase, and one special character.";
      };
      if (count($errors)) $_SESSION['errors'] = $errors;

      require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
      $pdo = new PDO($ce08_dsn, $ce08_un, $ce08_pw) or die("Could not connect");
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
      } else {
        die("Something went wrong.");
      }
    }
  }
  ?>

  <form action="NewAccount.php" method="POST" class="modal true">
    <h2 class="form-header">Register</h2>
    <ul>
      <?php
      if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $e) {
          print "<li>$e</li>";
        };
      };
      unset($_SESSION['errors']);
      ?>
    </ul>
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
  <script src="scripts/validateRegistration.js"></script>
</body>

</html>
