<?php 

$errors = [
    "invalidCharacters" => []
  ];

  // Check if any invalid characters
  $errors["invalidCharacters"] = $anyInvalidChars($_POST, "/[^a-zA-Z0-9@#%~_\^\*\-\.\?\!\/]/");

  // If any validation errors, compose header string with error info
  if (array_sum(array_map("count", $errors))) {
    $errorHeader = "Location: ../add.php?errors=true";
    foreach ($errors as $errorType => $e) {
      if (count($e)) {
        $errorHeader .= "&$errorType=" . implode(",", $e);
      }
    }
    $_POST["errors"] = $errors;
  } else {
    try {
      // If everything valid, prepare statement and attempt search
      $query = $pdo->prepare("SELECT id, fname, lname from players WHERE fname=? OR lname=?");
      $success = $query->execute([
        strtolower($_POST["fname"]),
        strtolower($_POST["lname"])
      ]);
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach ($res as $key => $value) {
        print $value["id"] . ", " . $value["fname"] . ", " . $value["lname"] . "<br>";
      }
    } catch (\Exception $e) {
      die;
    }
  }