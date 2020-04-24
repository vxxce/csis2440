<?php
// Db credentials
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";

// Check if user email exists.
$pdo = new PDO($ce08_dsn, $ce08_un, $ce08_pw) or die("Could not connect");
$prep = $pdo->prepare("SELECT * FROM `ce08`.`captains` WHERE `email`=?");
$prep->execute([$_POST["email"]]);
$res = $prep->fetch(PDO::FETCH_ASSOC);
$pdo = null;
$prep = null;

if (isset($res["email"])) {
  // User exists
  if (password_verify($_POST["pass"], $res["pass"])) {
    // And entered correcet password. Set Session variables.
    foreach ($res as $k => $v) $_SESSION[$k] = htmlentities($v);
    $_SESSION['loggedIn'] = true;
    unset($_SESSION['failedAttempts']);
    header("Location: Dashboard.php");
  } else {
    // User exists but password is incorrect
    $_SESSION["loginError"] = "Password was incorrect.";
    if (isset($_SESSION['failedAttempts'])) $_SESSION['failedAttempts']++; // TODO: Time penalty after 3 attempts
    else $_SESSION['failedAttempts'] = 0;
  }
} else $_SESSION['loginError'] = "That user does not exist.";
