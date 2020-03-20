<!DOCTYPE html>
<html lang="en">

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
    <form id="characterForm" action="characterResult.php" method="POST">
      <label for="characterName">Name: </label>
      <input type="text" name="characterName" id="characterName" required autofocus />
      <br>
      <label for="race">Race: </label>
      <select name="race" id="race" required>
        <option></option>
        <option value="human">Human</option>
        <option value="elf">Elf</option>
        <option value="halfling">Halfling</option>
        <option value="dwarf">Dwarf</option>
      </select>
      <br>
      <label for="class">Class: </label>
      <select name="class" id="class" required>
        <option></option>
        <option value="Cleric">Cleric</option>
        <option value="Fighter">Fighter</option>
        <option value="Magic-User">Magic-User</option>
        <option value="Thief">Thief</option>
      </select>
      <br>
      <label for="age">Age: </label>
      <input type="number" name="age" id="age" min="1" max="200" required />
      <br>
      <label for="kingdom">Kingdom: </label>
      <input type="text" name="kingdom" id="kingdom" />
      <br>
      <div id="gender-container">
        <label for="gender" id="gender">Gender: </label>
        <div id="male-container">
          <input type="radio" name="gender" id="genderM" value="male" required />
          <label for="genderM">Male</label>
        </div>
        <div id="female-container">
          <input type="radio" name="gender" id="genderF" value="female" required />
          <label for="genderF">Female</label>
        </div>
      </div>
      <button value="create">CREATE</button>
    </form>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>