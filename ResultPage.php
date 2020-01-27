<!DOCTYPE html>
<?php
include "IncludeMe.php";
$ship = $_POST['ship'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
?>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./index.css">
  <title>Results</title>
</head>

<body>
  <main>
    <?php
    echo "<h1>Your voyage on the <em>" . $ships[$ship]['name'] . "</em></h1>";
    ?>
    <hr />
    <h3>Leaving From:</h3>
    <?php
    echo $planets[$departure]["name"];
    ?>
    <h3>Arriving At:</h3>
    <?php
    echo $planets[$arrival]["name"];
    ?>
    <?php
    $dist = PlanetDistance(
      $planets[$departure]["x"],
      $planets[$departure]["y"],
      $planets[$departure]["z"],
      $planets[$arrival]["x"],
      $planets[$arrival]["y"],
      $planets[$arrival]["z"]
    );
    $time = $dist * $ships[$ship]['speed'];

    echo "<h3>Travel Distance: </h3><p>$dist</p>";
    echo "<h3>Travel Time: </h3><p>$time</p>";
    ?>
  </main>
</body>

</html>