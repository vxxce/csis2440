<?php

session_start();

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
  <nav>
    <ul>
      <li class="nav-item">Hello <?= $_SESSION['name'] ?>!</li>
      <li class="nav-item">
        <form class="nav-item" action="Logout.php">
          <button type="submit">LOGOUT</button>
        </form>
      </li>
    </ul>
  </nav>
  <ul>
    <li>Name: <?= $name ?></li>
    <li>Email: <?= $email ?></li>
    <li>Command: <?= $command ?></li>
    <li>Combat: <?= $combat ?></li>
    <li>Commerce: <?= $commerce ?></li>
    <li>Cunning: <?= $cunning ?></li>
  </ul>
</body>

</html>