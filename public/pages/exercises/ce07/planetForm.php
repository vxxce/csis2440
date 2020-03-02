<!DOCTYPE html>
<?php

require "../../headerNav.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php"; // store db credentials outside web root
// require_once "add.php";
// require_once "search.php";
// require_once "update.php";

// Get sanitized $_Post values, extract to prefixed variables.
extract(array_map('htmlentities', $_POST), EXTR_PREFIX_ALL, "e");

// Connect to db
try {
  $pdo = new PDO($ce07_dsn, $ce07_un, $ce07_pw);
} catch (\PDOException $e) {
  throw new PDOException("Could not connect to Database");
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
    <main>
      <div id="existing-planets">
        <?php
          echo "<h2>Planets</h2>";
          $query = $pdo->prepare("SELECT * FROM planets");
          $query->execute();
          $planets = $query->fetchAll(PDO::FETCH_ASSOC);
          echo "<ul>";
          foreach ($planets as $p) {
            echo "<li><a href='#'>$p[name]</a></li>";
          };
          echo "</ul>";

          ?>
        <form action="<?php getcwd() . 'planetForm.php' ?>" method="POST">
          <h4>Search</h4>
          <label for="name">Planet Name: </label>
          <input type="text" name="name" id="name">
          <input type="submit" value="SEARCH">
        </form>
      </div>
      <?php 

          if (isset($e_name)){
            $query = $pdo->prepare("SELECT * FROM planets where name=?");
            $query->execute([$e_name]);
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r(implode("<br>", array_values($res[0])));
          };
          ?>

</main>
<script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>
<?php 
$pdo = null;
$query = null;
?>

</html>
