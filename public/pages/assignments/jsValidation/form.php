<?php
// Init queryType to "add" if it has not been set otherwise.
$queryType = (!empty($_POST["queryType"])) ? htmlentities($_POST["queryType"]) : "ADD";
// Utility functions for validation, cleaning, formatting, etc
require_once "scripts/utils.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JS Validation</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <form action="form.php" method="post">
      <button type="submit" name="queryType" class="query-toggle <?= $active("ADD", $queryType) ?>" value="ADD">ADD</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("UPDATE", $queryType) ?>" value="UPDATE">UPDATE</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("SEARCH", $queryType) ?>" value="SEARCH">SEARCH</button>
    </form>
    <?php

    // Show appropriate form for adding, searching, or updating
    switch ($queryType) {
      case "ADD":
        include_once "add.php";
        break;
      case "UPDATE":
        include_once "update.php";
        break;
      case "SEARCH":
        include_once "search.php";
        break;
      default:
        break;
    }
    ?>
  </main>
  <script src="scripts/validate.js"></script>
</body>

</html>