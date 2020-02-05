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
    <form id="characterCreator">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Name" />
      <br>
      <label for="race">Race</label>
      <select name="race" id="race">
        <option>Race</option>
        <option>Human</option>
        <option>Elf</option>
        <option>Dwarf</option>
        <option>Halfling</option>
      </select>
      <br>
      <label for="class">Class</label>
      <select name="class" id="class">
        <option value="">Class</option>
        <option>Cleric</option>
        <option>Fighter</option>
        <option>Magic-user</option>
        <option>Thief</option>
      </select>
      <br>
      <label for="age">Age</label>
      <input type="text" name="age" id="age" placeholder="Age" />
      <br>
      <label for="gender">Gender</label>
      <input type="radio" name="gender" id="genderM" value="male" />
      <label for="genderM">Male</label>
      <input type="radio" name="gender" id="genderF" value="female" />
      <label for="genderF">Female</label>
      <br>
      <label for="kingdom">Kingdom</label>
      <input type="text" name="kingdom" id="kingdom" placeholder="Kingdom" />
      <button value="create">CREATE</button>
    </form>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>