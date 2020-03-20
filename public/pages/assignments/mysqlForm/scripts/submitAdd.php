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
$errors["invalidCharacters"] = $anyInvalidChars($_POST, "/[^a-zA-Z0-9@#%~_\^\*\-\.\?\!\/]/");

// Check maxLength violations
if ($maxLengthViolation($_POST["fname"], 20, 0)) $errors["maxLengthViolation"][] = "fname";
if ($maxLengthViolation($_POST["lname"], 20, 0)) $errors["maxLengthViolation"][] = "lname";

// Format posted birthdate as YYYY-MM-DD. Browsers supporting HTML5 date input will do this for us,
// but if not, try to make sense of possible inputs. If input intrinsically ambiguous (01/02/05), add to error array.
// i.e. '1.23.1999' -> '1999-01-23'
$_POST["birthdate"] = $formatDate($_POST["birthdate"]) or $errors["invalidFormat"][] = "birthdate";

// Check for valid email format.
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $errors["invalidFormat"][] = "email";

// Check that password and password-confirmation match
if ($_POST["password"] != $_POST["password-confirmation"]) $errors["passwordMismatch"][] = true;

// If any validation errors, compose header string with error info as params and redirect
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
    // If everything valid, prepare statement and attempt to insert into db
    $query = $pdo->prepare("INSERT INTO players (fname, lname, birthdate, email, `password`) values (?, ?, ?, ?, ?)");
    $query->execute([
      strtolower($_POST["fname"]),
      strtolower($_POST["lname"]),
      $_POST["birthdate"],
      $_POST["email"],
      // Concat password with email to use as salt before hashing.
      hash("ripemd256", $_POST["password"] . $_POST["email"])
    ]);
  } catch (\Exception $e) {
    die('Interal Server Error - HTTP 500');
  }
  print "<p>You successfully added " . ucfirst($_POST["fname"]) . " " . ucfirst($_POST["lname"]) . "</p>";
}
