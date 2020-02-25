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
        $query = $pdo->prepare("INSERT INTO `planets` (`name`, `x`, `y`, `z`, `description`) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$v['name'], $v['x'], $v['y'], $v['z'], $v['description']]);
      };
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    try {
      $query = $pdo->prepare("SELECT * FROM `planets`");
      $query->execute();
      $res = $query->fetchAll();
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage() + "S E L E C T", (int)$e->getCode());
    }
    $query = null;
    $pdo = null;
    
 print_r($res)
    
  ?>
  
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
