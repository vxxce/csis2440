<!DOCTYPE html>
<?php 

// require connection file (stored below web root)
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
// Get sanitized, lowercased $_Post values, extract to prefixed variables.
extract(array_map("strtolower", array_map("htmlentities", $_POST)), EXTR_PREFIX_ALL, "e");

// Connect to db
try {
  $pdo = new PDO($ce07_dsn, $ce07_un, $ce07_pw);
} catch (\PDOException $e) {
  throw new PDOException("Error connecting to Database");
};

$getAllPlanets = function ($pdo) {
  $query = $pdo->prepare("SELECT * FROM planets ORDER BY `name` ASC");
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
};

?>

<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forms and Database</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  </head>
  <body> 
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
    <main>
      <?php 
      include_once "currentPlanets.php"; 
      ?>

      <form action="planetForm.php" method="POST">
        <input type="submit" name="action" value="search">
        <input type="submit" name="action" value="add">
        <input type="submit" name="action" value="update">
      </form>

      <?php 

      if(isset($e_action)) include_once "queryForm.php";
      if(isset($e_submission)) {
        switch ($e_submission) {
          case "add":
            include_once "add.php";
            break;
          case "search":
            include_once "search.php";
            break;
          case "update":
            include_once "update.php";
            break;
          default:
            # code...
            break;
        }
      }
      
      ?>

    </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
  </body>
  <?php 

  $pdo = null;
  $query = null;
  
  ?>

</html>
