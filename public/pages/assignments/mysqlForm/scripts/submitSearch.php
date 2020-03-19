<?php

$errors = [
  "invalidCharacters" => [],
  "missingData" => []
];

// Check if any invalid characters
$errors["invalidCharacters"] = $anyInvalidChars($_POST, "/[^a-zA-Z0-9@#%~_\^\*\-\.\?\!\/]/");

// Check if at least field has data
if (empty($_POST["fname"]) && empty($_POST["lname"])) $errors["missingData"][] = "allFieldsEmpty";

// If any validation errors, compose header string with error info
if (array_sum(array_map("count", $errors))) {
  $errorHeader = "Location: ../search.php?errors=true";
  foreach ($errors as $errorType => $e) {
    if ($e) {
      $errorHeader .= "&$errorType=" . implode(",", $e);
    }
  }
  $_POST["errors"] = $errors;
  header($errorHeader);
  print_r($errors);
} else {
  try {
    // If at least one field, make  queries conditional on which fields were completed
    if ($_POST["fname"] && $_POST["lname"]) {
      $query = $pdo->prepare("SELECT id, fname, lname from players WHERE fname REGEXP ? and lname REGEXP ? ORDER BY lname ASC, fname ASC");
      $success = $query->execute([
        strtolower($_POST["fname"]),
        strtolower($_POST["lname"])
      ]);
    } else if ($_POST["fname"]) {
      $query = $pdo->prepare("SELECT id, fname, lname from players WHERE fname REGEXP ? ORDER BY fname ASC");
      $success = $query->execute([strtolower($_POST["fname"])]);
    } else {
      $query = $pdo->prepare("SELECT id, fname, lname from players WHERE lname REGEXP ? ORDER BY lname ASC");
      $success = $query->execute([strtolower($_POST["lname"])]);
    };
    // fetch results
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    die('Error');
  };

// Print table of results, if any.
print "<h2>Results</h2>";
if (!count($res)) {
  print "No results :(";
} else {
  print "<table><thead><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr></thead>";
  print "<tbody>";
  foreach ($res as $key => $value)
    print "<tr><td>" . $value["id"] . "</td><td>" . ucfirst($value["fname"]) . "</td><td>" . ucfirst($value["lname"]) . "</td></tr>";
  };
  print "</tbody></table>";
}
