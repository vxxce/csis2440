<?php 
$queryType = (!empty($_POST["queryType"])) ? $_POST["queryType"] : "add";
require_once "scripts/utils.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
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
  <form action="form.php" method="post">
    <input type="submit" name="queryType" class="query-toggle <?=$active("add", $queryType)?>" value="add">
    <input type="submit" name="queryType" class="query-toggle <?=$active("update", $queryType)?>" value="update">
    <input type="submit" name="queryType" class="query-toggle <?=$active("search", $queryType)?>" value="search">
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

</body>
</html>