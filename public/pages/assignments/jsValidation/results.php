<?php
// Set default query type to add if no selection yet.
if (isset($_GET['errors'])) $submitType = $_GET['submitType'];
else if (isset($_POST['submit'])) $submitType = $_POST['submit'];
else $submitType = "add";
$queryType = (!empty($_POST["queryType"])) ? $_POST["queryType"] : "add";
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
  <title>Results</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <form action="form.php" method="POST">
      <input type="submit" name="queryType" class="query-toggle <?= $active("add", $queryType) ?>" value="add">
      <input type="submit" name="queryType" class="query-toggle <?= $active("update", $queryType) ?>" value="update">
      <input type="submit" name="queryType" class="query-toggle <?= $active("search", $queryType) ?>" value="search">
    </form>

    <?php
    // Execute script appropriate to query type (add, update, delete)
    switch ($submitType) {
      case "add":
        require_once "scripts/submitAdd.php";
        break;
      case "update":
        require_once "scripts/submitUpdate.php";
        break;
      case "search":
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
