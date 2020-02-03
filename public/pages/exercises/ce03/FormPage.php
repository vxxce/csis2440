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
  <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
  <title>Distance Calculator</title>
</head>

<body>
<header>
  <a class="logo" href="/index.php">Zachary Olpin</a>
  <nav>
      <a id="mobileNav">Menu</a>
      <ul class="nav-list" id="nav-list">
        <li class="nav-link"><a href="/pages/assignments/assignments.php">Assignments</a></li>
        <li class="nav-link"><a href="/pages/assignments/shop.php">Shop</a></li>
        <li class="nav-link"><a href="/pages/exercises/exercises.php">Exercises</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Distance Calculator</h2>
    <div class='hr'></div>
    <section>
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
        <br />
        <label for="planet1">Departure planet:</label>
        <select id="planet1" name="departure">
          <option value="--">--</option>
          <?php
          for ($i = 0; $i < 17; $i++) {
            print("<option value=" . $i . ">" . $planetArray[$i] . "</option>");
          }
          ?>
        </select>
        <br />
        <lable for="planet2">Destination planet:</lable>
        <select id="planet2" name="arrival">
          <option value="--">--</option>
          <?php
          for ($i = 0; $i < 17; $i++) {
            print("<option value=" . $i . ">" . $planetArray[$i] . "</option>");
          }
          ?>
        </select>
        <input type="submit" name="Create" value="CALCULATE">
      </form>
    </section>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>