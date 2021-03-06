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
$errors["invalidCharacters"] = $anyInvalidChars($_POST, "/[^a-zA-Z0-9@#%~_\^\*\-\.\?\!\/]/");

// Check maxLength violations
if ($maxLengthViolation($_POST["fname"], 20, 0)) $errors["maxLengthViolation"][] = "fname";
if ($maxLengthViolation($_POST["lname"], 20, 0)) $errors["maxLengthViolation"][] = "lname";

// If any validation errors, compose header string with error info in params and redirect
if (array_sum(array_map("count", $errors))) {
  $errorHeader = "Location: results.php?errors=true";
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
    $query = $pdo->prepare("UPDATE players SET fname=?, lname=? WHERE email=? AND `password`=?");
    $success = $query->execute([
      strtolower($_POST["fname"]),
      strtolower($_POST["lname"]),
      $_POST["email"],
      hash("ripemd256", $_POST["password"] . $_POST["email"])
    ]);
  } catch (\Exception $e) {
    die('Internal Server Error - HTTP 500');
  }
  if ($query->rowCount()) print "<p>You successfully updated " . ucfirst($_POST["fname"]) . " " . ucfirst($_POST["lname"]) . "</p>";
}
