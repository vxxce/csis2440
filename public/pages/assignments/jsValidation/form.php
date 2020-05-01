<?php
// Init queryType to "add" if it has not been set otherwise.
$queryType = (!empty($_POST["queryType"])) ? htmlentities($_POST["queryType"]) : "add";
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
      <button type="submit" name="queryType" class="query-toggle <?= $active("add", $queryType) ?>" value="add">ADD</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("update", $queryType) ?>" value="update">UPDATE</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("search", $queryType) ?>" value="search">SEARCH</button>
    </form>
    <?php

    // Show appropriate form for adding, searching, or updating
    switch ($queryType) {
      case "add":
        include_once "add.php";
        break;
      case "update":
        include_once "update.php";
        break;
      case "search":
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