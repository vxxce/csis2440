<!DOCTYPE html>
<?php
$planetArray = [
  "Ares", "Ariel", "Beaumonde", "Bellerophon", "Haven", "Hera",
  "Higgins' Moon", "Jiangyin", "Lilac", "Miranda", "Osiris",
  "Persephone", "Regina", "Santo", "St. Albans", "Triumph", "Whitefall"
];
$shipsArray = ["Crate", "Lightening", "Starliner", "VD Tug", "Biel-Corp II", "VD Behemoth"];
?>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./index.css">
  <title>Form Page</title>
</head>

<body>
  <main>
    <h2>Distance Calculator</h2>
    <form method="POST" action="ResultPage.php">
      <label for="ship">The ship you will use:</label>
      <select id="ship" name="ship">
        <option value="--">--</option>
        <?php
        for ($i = 0; $i < 6; $i++) {
          print("<option value=" . $i . ">" . $shipsArray[$i] . "</option>");
        }
        ?>
      </select>
      <label for="planet1">Departure planet</label>
      <select id="planet1" name="departure">
        <option value="--">--</option>
        <?php
        for ($i = 0; $i < 17; $i++) {
          print("<option value=" . $i . ">" . $planetArray[$i] . "</option>");
        }
        ?>
      </select>
      <lable for="planet2">Destination planet</lable>
      <select id="planet2" name="arrival">
        <option value="--">--</option>
        <?php
        for ($i = 0; $i < 17; $i++) {
          print("<option value=" . $i . ">" . $planetArray[$i] . "</option>");
        }
        ?>
      </select>
      <input type="submit" name="Create" value="Get the Estimate">
    </form>
  </main>
</body>

</html>