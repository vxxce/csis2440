<!DOCTYPE html>
<?php
include "IncludeMe.php";
$ship = $_POST['ship'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Results</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php require("../../headerNav.php"); ?>
  <main>
    <?php
    echo "<h2>Your voyage on the <em>" . $ships[$ship]['name'] . "</em></h2>";
    ?>
    <div class="hr"></div>
    <div id="results">
      <div id="departure">
        <h3>Leaving From:</h3>
        <?php
        echo "<div class='container'><h4>" . $planets[$departure]["name"] . "</h4>";
        echo "<img src='/assets/imgs/planets/$departure.jpg'></img></div>";
        ?>
      </div>

      <div id="destination">
        <h3>Arriving At:</h3>
        <?php
        echo "<div class='container'><h4>" . $planets[$arrival]["name"] . "</h4>";
        echo "<img src='/assets/imgs/planets/$arrival.jpg'></img></div>";
        ?>
      </div>
      <div id="duration">
        <?php
        $dist = round(PlanetDistance(
          $planets[$departure]["x"],
          $planets[$departure]["y"],
          $planets[$departure]["z"],
          $planets[$arrival]["x"],
          $planets[$arrival]["y"],
          $planets[$arrival]["z"]
        ), 2);
        $time = round($dist * $ships[$ship]['speed'], 2);
        echo "<h3>Trip Details</h3>";
        echo "<p><strong>Distance: </strong>$dist AU.</p>";
        echo "<p><strong>Travel time: </strong>$time days</p>";
        ?>
      </div>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
