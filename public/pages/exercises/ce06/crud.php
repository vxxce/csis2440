<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<?php
require "../../headerNav.php";
require_once "planets.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php"; // store db credentials outside web root
$pdo = new PDO($dsn, $sec_un, $sec_pw);

// Selects all planets from database at call time and prints to document
$selectAll = function ($pdo) {
  // Use prepared statements to sanitize all queries
  $query = $pdo->prepare("SELECT * FROM `planets`"); 
  $query->execute();
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  return array_reduce($res, function ($acc, $v) {
    return $acc . "<li><h4>{$v['name']}</h4><p>{$v['description']}</p></li>\n";
  }, "<ul class='no-list'>") . "</ul>";
};
?>

<body>
  <main>
    <?php
    try {
      // Wipe planets table on page load.
      $query = $pdo->prepare("DELETE FROM `planets`");
      $query->execute();
      // Insert planets with 'name', 'coordinates', and 'description' fields
      foreach ($planets as $p) {
        $coordinates = json_encode(["x" => $p["x"], "y" => $p["y"], "z" => $p["z"]]);
        $query = $pdo->prepare("INSERT INTO `planets` (`name`, `coordinates`, `description`) VALUES (?, ?, ?)");
        $query->execute([$p['name'], $coordinates, $p['description']]);
      };
    } catch (\PDOException $e) {
      echo "<h1>500 - Internal Server Error</h1>";
    }

    echo "<section id='all-planets'>";
    try {
      echo "<h3>All Planets</h3>"
         . "<p class='comment'>"
         . "// Insert all planets from array into db, <br>"
         . "// select all, and display, "
         . "</p>";
      print $selectAll($pdo);
    } catch (\PDOException $e) {
      echo "<h1>500 - Internal Server Error</h1>";
    }
    echo "</section>";

    echo "<section id='remaining-planets'>";
    // Make new planet array with every other planet from original
    $everyOtherPlanet = array_filter($planets, function ($_v, $k) {
      return $k % 2 ? true : false;
    }, ARRAY_FILTER_USE_BOTH);
    // Delete corresponding planets from db
    foreach ($everyOtherPlanet as $p) {
      $query = $pdo->prepare("DELETE FROM `planets` WHERE `name`=?");
      $query->execute([$p['name']]);
    };

    echo "<h3>Remaining Planets</h3>";
    echo "<p class='comment'>"
      . "// Delete from db every other planet from original array, <br>"
      . "// re-select all and display. "
      . "</p>";
    print $selectAll($pdo);
    echo "</section>";

    // Close connection.
    $query = null;
    $pdo = null;

    ?>

  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>