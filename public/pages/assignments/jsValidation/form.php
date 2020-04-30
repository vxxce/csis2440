<?php
// Init queryType to "add" if it has not been set otherwise.
$queryType = (!empty($_POST["queryType"])) ? $_POST["queryType"] : "add";
// Utility functions for validation, cleaning, formatting, etc
require_once "scripts/utils.php";
// Database cononection credentials. (Stored below web root)
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
// make singular db connection object to be used for all queries
$pdo = new PDO($mysql_dsn, $mysql_un, $mysql_pw);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Form</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <form action="form.php" method="post">
      <input type="submit" name="queryType" class="query-toggle <?= $active("add", $queryType) ?>" value="add">
      <input type="submit" name="queryType" class="query-toggle <?= $active("update", $queryType) ?>" value="update">
      <input type="submit" name="queryType" class="query-toggle <?= $active("search", $queryType) ?>" value="search">
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
</body>

</html>