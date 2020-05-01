<?php

$errors = [
  "unregisteredEmail" => [],
  "maxLengthViolation" => [],
  "invalidCharacters" => [],
  "wrongPassword" => []
];

// Check if any required fields empty
$errors["emptyFields"] = $anyEmpty($_POST);

// Check if any invalid characters
if (preg_match("/[^a-zA-Z]/", $_POST['fname']) === 1) $errors["invalidCharacters"][] = "fname";
if (preg_match("/[^a-zA-Z]/", $_POST['lname']) === 1) $errors["invalidCharacters"][] = "lname";

// Check maxLength violations
if ($maxLengthViolation($_POST["fname"], 20, 0)) $errors["maxLengthViolation"][] = "fname";
if ($maxLengthViolation($_POST["lname"], 20, 0)) $errors["maxLengthViolation"][] = "lname";

// If any validation errors, compose header string with error info in params and redirect
if (array_sum(array_map("count", $errors))) {
  $errorHeader = "Location: form.php?submitType=update&errors=true";
  foreach ($errors as $errorType => $e) {
    if (count($e)) {
      $errorHeader .= "&$errorType=" . implode(",", $e);
    }
  }
  $_POST["errors"] = $errors;
  header($errorHeader);
} else {
  try {
    // If everything valid, prepare statement and attempt to update
    $query = $pdo->prepare("SELECT `password` from players where email=?");
    $query->execute([$_POST['email']]);
    $truePass = $query->fetch(PDO::FETCH_ASSOC)['password'];
    if (password_verify($_POST['password'], $truePass)) {
      $query = $pdo->prepare("UPDATE players SET fname=?, lname=? WHERE email=?");
      $query->execute([strtolower($_POST["fname"]), strtolower($_POST["lname"]), $_POST["email"]]);
      if ($query->rowCount()) print "<p>You successfully updated " . ucfirst($_POST["fname"]) . " " . ucfirst($_POST["lname"]) . "</p>";
    } else {
      print "<p>Bad credentials :(</p>";
    } 
  } catch (\Exception $e) {
    die('Internal Server Error - HTTP 500');
  }
}
