<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php

    require "../../headerNav.php";
    require_once "planets.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";

    try {
      $pdo = new PDO($dsn, $sec_un, $sec_pw) or die('no go');
      foreach ($planets as $k => $v) {
        $coordinates = json_encode(["x" => $v["x"], "y" => $v["y"], "z" => $v["z"]]);
        $query = $pdo->prepare("INSERT INTO `planets` (`name`, `coordinates`, `description`) VALUES (?, ?, ?)");
        $query->execute([$v['name'], $coordinates, $v['description']]);
      };
    } catch (\PDOException $e) {
      echo "<h1>500 - Internal Server Error</h1>";
    }
    $query = null;
    try {
      $q = $pdo->prepare("SELECT * FROM `planets`");
      $q->execute();
      $res = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($res as $v) {
        echo "<p>";
        print "Name: {$v['name']}<br>";
        echo "Description: {$v['description']}";
        echo "</p>";
      }
    } catch (\PDOException $e) {
      echo "<h1>500 - Internal Server Error</h1>";
    }

    $query = null;
    $pdo = null;
  ?>
  
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
