<!DOCTYPE html>
<html lang="en">

<?php
// Sanitize and capitalize $_POST values and extract into symbol table with prefix
extract(array_map("ucwords", array_map("htmlentities", $_POST)), EXTR_PREFIX_ALL, "e");

// Construct a filepath from race, class, and gender values to use as img src for character photo.
$charImgPath = "/assets/imgs/characters/" . array_reduce([$e_race, $e_class, $e_gender], function ($acc, $curr) {
  return $acc . substr($curr, 0, 2);
}, "") . ".jpg";

// Read from local files RaceInfo.txt and ClassInfo.text. Clean up the raw text a bit and 
// make arrays with race/class name as key and relevant captured portion of file as value.
$raceInfo = file_get_contents("RaceInfo.txt");
$raceInfo = array_combine(
  ["human", "elf", "dwarf", "halfling", "toss"],
  explode("}", preg_replace('/{/', '', preg_replace('/[\n\r]/', ' ', $raceInfo)))
);
array_pop($raceInfo);
$classInfo = file_get_contents("ClassInfo.txt");
$classInfo = array_combine(
  ["fighter", "cleric", "thief", "magic-User", "toss"],
  explode("}", preg_replace('/{/', '', preg_replace('/[\n\r]/', ' ', $classInfo)))
);
array_pop($classInfo);

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Character Creator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/characterCreator.css">
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
    <h2>Character Creator</h2>
    <div class="hr"></div>
    <div id="character-container">
      <header id="character-header">
        <h3 id="character-title">
          <?php
          // Kingdom field in form was not required. If no entry, use fallback value
          if ($e_kingdom) echo $e_characterName . " of " . $e_kingdom;
          else echo $e_characterName . " of the Unruled";
          ?>
        </h3>
      </header>
      <figure id="character-figure">
        <?php
        // Use dynamically constructed filepath to get correct character image
        echo "<img id='character-img' src='$charImgPath' alt='Your character' />\n"
        ?>
        <figcaption>
          <?php
          // Caption character image with race, class, and age.
          echo ucfirst($e_race) . " " . ucfirst($e_class);
          echo "\n<br>\nAge $e_age";
          ?>
        </figcaption>
      </figure>
      <div id="character-stats">
        <ul id="stats-list">
          <?php
          // Loop over character ability, assign random scores from 1-10 and render as list items.
          $stats = ["Strength: ", "Constitution: ", "Dexterity: ", "Wisdom: ", "Intelligence: ", "Charisma: "];
          foreach ($stats as $value) {
            echo "<li class='stats-item'><b>$value</b>" . rand(1, 10) . "</li>";
          };
          ?>
        </ul>
      </div>
      <div id="character-description">
        <section id="race-description">
          <?php
          // Render race description from raceInfo array
          echo "<h4>Race: $e_race</h4>";
          echo $raceInfo[lcfirst($e_race)];
          ?>
        </section>
        <section id="class-description">
          <?php
          // Render class description from classInfo array
          echo "<h4>Class: $e_class</h4>";
          echo $classInfo[lcfirst($e_class)];
          ?>
        </section>
      </div>
    </div>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>