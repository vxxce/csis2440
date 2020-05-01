<?php
// Set default query type to add if no selection yet.
if (isset($_GET['errors'])) $submitType = htmlentities($_GET['submitType']);
else if (isset($_POST['submit'])) $submitType = htmlentities($_POST['submit']);
else $submitType = "ADD";
$queryType = (!empty($_POST["queryType"])) ? htmlentities($_POST["queryType"]) : "ADD";
require_once "scripts/utils.php";
// Connect to db
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
require_once "scripts/utils.php";
$pdo = new PDO($mysql_dsn, $mysql_un, $mysql_pw);
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
    <form action="form.php" method="POST">
      <button type="submit" name="queryType" class="query-toggle <?= $active("ADD", $queryType) ?>" value="ADD">ADD</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("UPDATE", $queryType) ?>" value="UPDATE">UPDATE</button>
      <button type="submit" name="queryType" class="query-toggle <?= $active("SEARCH", $queryType) ?>" value="SEARCH">SEARCH</button>  
    </form>

    <?php
    // Execute script appropriate to query type (add, update, delete)
    switch ($submitType) {
      case "ADD":
        require_once "scripts/submitAdd.php";
        break;
      case "UPDATE":
        require_once "scripts/submitUpdate.php";
        break;
      case "SEARCH":
        require_once "scripts/submitSearch.php";
        break;
      default:
        break;
    }
    ?>
  </main>
</body>
<?php
// Close connection
$pdo=null;
?>
</html>
