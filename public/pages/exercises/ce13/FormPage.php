<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Distance Calculator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
      <label for="number">how many divs?</label>
      <input type="number" name="num" id="num">
      <button type="button" onclick="displayResults()">Make em</button>

   <div id="results"></div>
  </main>
  <script src="displayResults.js" type="application/javascript"></script>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>