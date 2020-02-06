<!DOCTYPE html>
<?php

use function PHPSTORM_META\map;

extract($_POST, EXTR_PREFIX_ALL, "p");
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Character Creator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
</head>

<body>
  <header>
    <a class="logo" href="/index.php">Zachary Olpin</a>
    <nav>
      <a id="mobileNav">Menu</a>
      <ul class="nav-list" id="nav-list">
        <li class="nav-link"><a href="/pages/exercises/exercises.php">Exercises</a></li>
        <li class="nav-link"><a href="/pages/assignments/assignments.php">Assignments</a></li>
        <li class="nav-link"><a href="/pages/assignments/shop.php">Shop</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Character Creator</h2>
    <div class='hr'></div>
    <?php
      function kv($k, $v) {
        echo "<li><strong>$k:</strong> $v</li>";
      }

      echo "<ul>";
      array_map('kv', array_keys($_POST), $_POST);
      echo "</ul>";
    ?>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>