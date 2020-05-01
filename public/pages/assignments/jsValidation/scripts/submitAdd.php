<?php

// Init empty collection of errorType => [errors]
$errors = [
  "emptyFields" => [],
  "maxLengthViolation" => [],
  "invalidCharacters" => [],
  "invalidFormat" => [],
  "passwordMismatch" => []
];

// Check if any required fields empty
$errors["emptyFields"] = $anyEmpty($_POST);

// Check if any invalid characters
if (preg_match("/[^a-zA-Z]/", $_POST['fname']) === 1) $errors["invalidCharacters"][] = "fname";
if (preg_match("/[^a-zA-Z]/", $_POST['lname']) === 1) $errors["invalidCharacters"][] = "lname";

// Check maxLength violations
if ($maxLengthViolation($_POST["fname"], 20, 0)) $errors["maxLengthViolation"][] = "fname";
if ($maxLengthViolation($_POST["lname"], 20, 0)) $errors["maxLengthViolation"][] = "lname";

// Check for valid email format.
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $errors["invalidFormat"][] = "email";

// Check for valid phone format.
$phone = str_replace(["(", " ", ")", "-", "."], "", $_POST['phone']);
if ($phone.preg_match("/[^0-9]/", $_POST['phone']) === 1) $errors["invalidFormat"][] = "phone";


// Check that password and confirmation match
if ($_POST["password"] != $_POST["confirm"]) $errors["passwordMismatch"][] = true;

// If any validation errors, compose header string with error info as params and redirect
if (array_sum(array_map("count", $errors))) {
  $errorHeader = "Location: form.php?submitType=add&errors=true";
  foreach ($errors as $errorType => $e) {
    if (count($e)) {
      $errorHeader .= "&$errorType=" . implode(",", $e);
    }
  }
  $_POST["errors"] = $errors;
  header($errorHeader);
} else {
  try {
    // If everything valid, prepare statement and attempt to insert into db
    $query = $pdo->prepare("INSERT INTO players (fname, lname, phone, email, `password`) values (?, ?, ?, ?, ?)");
    $query->execute([
      strtolower($_POST["fname"]),
      strtolower($_POST["lname"]),
      $phone,
      $_POST["email"],
      // Concat password with email to use as salt before hashing.
      hash("ripemd256", $_POST["password"] . $_POST["email"])
    ]);
  } catch (\Exception $e) {
    die('Interal Server Error - HTTP 500');
  }
  print "<p>You successfully added " . ucfirst($_POST["fname"]) . " " . ucfirst($_POST["lname"]) . "</p>";
}
