<?php
session_start();
// User not logged in.
if (!isset($_SESSION['email'])) header("Location: Login.php");

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$command = $_SESSION['command'];
$combat = $_SESSION['combat'];
$commerce = $_SESSION['commerce'];
$cunning = $_SESSION['cunning'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <nav>
      <ul>
        <li class="nav-item"><?= $_SESSION['name'] ?></li>
          <li class="nav-item">
            <form class="nav-item" action="Logout.php">
              <button class="nav-item" type="submit">Logout</button>
            </form>
          </li>
      </ul>
    </nav>
    <ul id="stats-list">
      <li class="stats">
        <span>Email</span>
        <div class="trail"></div>
        <span><?= $email ?></span>
      </li>
      <li class="stats">
        <span>Command</span>
        <div class="trail"></div>
        <span><?= $command ?></span>
      </li>
      <li class="stats">
        <span>Combat</span>
        <div class="trail"></div>
        <span><?= $combat ?></span>
      </li>
      <li class="stats">
        <span>Commerce</span>
        <div class="trail"></div>
        <span><?= $commerce ?></span>
      </li>
      <li class="stats">
        <span>Cunning</span>
        <div class="trail"></div>
        <span><?= $cunning ?></span>
      </li>
    </ul>
  </main>
</body>

</html>