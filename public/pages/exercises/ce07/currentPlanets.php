<?php

echo "<div id='existing-planets'>";
echo "<h2>Planets</h2>";
$planets = $getAllPlanets($pdo);
echo "<ul>";
foreach ($planets as $p) {
  echo "<li><a href='#'>" . ucwords($p['name']) . "</a></li>";
};
echo "</ul>";
echo "</div>";
