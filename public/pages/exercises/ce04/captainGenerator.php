<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Captain Generator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
    <h2>Captain Generator</h2>
    <div class='hr'></div>
    <form id="captainGenerator" action="captainResult.php" method="POST">
      <label for="firstname">First Name: </label>
      <input type="text" name="firstname" id="firstname" required autofocus/>
      <br>
      <label for="lastname">Last Name: </label>
      <input type="text" name="lastname" id="lastname" required />
      <br>
      <label for="age">Age: </label>
      <input type="number" name="age" id="age" maxlength="3" required/>
      <br>
      <div id="gender-container">
        <label for="gender" id="gender">Gender: </label>
        <div id="male-container">
          <input type="radio" name="gender" id="genderM" value="male" />
          <label for="genderM">Male</label>
        </div>
        <div id="female-container">
          <input type="radio" name="gender" id="genderF" value="female" />
          <label for="genderF">Female</label>
        </div>
      </div>
      <button value="create">CREATE</button>
    </form>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
