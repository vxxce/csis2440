<!DOCTYPE html>

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
    <form id="characterCreator" action="characterResult.php" method="POST">
      <label for="name">Name: </label>
      <input type="text" name="name" id="name" required autofocus/>
      <br>
      <label for="race">Race: </label>
      <select name="race" id="race" required>
        <option>&nbsp;</option>
        <option value="human">Human</option>
        <option value="elf">Elf</option>
        <option value="dwarf">Dwarf</option>
        <option value="halfling">Halfling</option>
      </select>
      <br>
      <label for="class">Class: </label>
      <select name="class" id="class" required>
        <option>&nbsp;</option>
        <option value="cleric">Cleric</option>
        <option value="fighter">Fighter</option>
        <option value="magicUser">Magic-user</option>
        <option value="thief">Thief</option>
      </select>
      <br>
      <label for="age">Age: </label>
      <input type="number" name="age" id="age" required/>
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
      <label for="kingdom">Kingdom: </label>
      <input type="text" name="kingdom" id="kingdom" required/>
      <button value="create">CREATE</button>
    </form>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>