<?php

switch ($e_action) {
  case "search":
    print <<<HTML
    <div id="query-form">
      <form action="planetForm.php" method="POST">
        <h3>$e_action the planets</h3>
        <p><i>Enter the planet name, coordinates, or faction</i></p>
        <label for="name">Planet Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label>Coordinates:</label>
        <br>
        <label for="x_coord">X: </label>
        <input type="number" name="x_coord" id="x_coord" max="360" min="0">
        <label for="y_coord">Y: </label>
        <input type="number" name="y_coord" id="y_coord" max="360" min="0">
        <label for="z_coord">Z: </label>
        <input type="number" name="z_coord" id="x_coord" max="360" min="0">
        <br>
        <label for="faction">Faction: </label>
        <select name="faction" id="faction">
          <option disabled selected value> - - </option>
          <option value="alliance">Alliance</option>
          <option value="pirates">Pirates</option>
          <option value="rebels">Rebels</option>
          <option value="imperial">Imperial</option>
          <option value="free worlds">Free Worlds</option>
        </select>
        <input type="submit" name="submission" value=$e_action >
      </form>
    </div>
HTML;
    break;
  case "add":
    print <<<HTML
    <div id="query-form">
      <form action="planetForm.php" method="POST">
        <h3>$e_action a new planet</h3>
        <p><i>All fields required</i></p>
        <label for="name">Planet Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label>Coordinates:</label>
        <br>
        <label for="x_coord">X: </label>
        <input type="number" name="x_coord" id="x_coord" max="360" min="0">
        <label for="y_coord">Y: </label>
        <input type="number" name="y_coord" id="y_coord" max="360" min="0">
        <label for="z_coord">Z: </label>
        <input type="number" name="z_coord" id="x_coord" max="360" min="0">
        <br>
        <label for="faction">Faction: </label>
        <select name="faction" id="faction">
          <option disabled selected value> - - </option>
          <option value="alliance">Alliance</option>
          <option value="pirates">Pirates</option>
          <option value="rebels">Rebels</option>
          <option value="imperial">Imperial</option>
          <option value="free worlds">Free Worlds</option>
        </select>
        <label for="description">Description: </label>
        <br>
        <textarea name="description" id="description" rows="4" cols="80" maxlength="900" ></textarea>
        <input type="submit" name="submission" value=$e_action >
      </form>
    </div>
HTML;
    break;
  case "update":
    print <<<HTML
    <div id="query-form">
      <form action="planetForm.php" method="POST">
        <h3>Update an existing planet's description</h3>
        <p><i></i></p>
        <label for="name">Planet Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description: </label>
        <br>
        <textarea name="description" id="description" rows="4" cols="80" maxlength="900" ></textarea>
        <input type="submit" name="submission" value=$e_action >
      </form>
    </div>
HTML;
    break;
  default:
    break;
}
