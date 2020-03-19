<h2>Update a player's name</h2>
<form action="results.php" method="POST">
  <p><i>You must know the player's email and password to update their information.</i></p>
  <label for="email">Email:</label>
  <input type="email" name="email" class="field" required maxlength="50">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" class="field" required>
  <br>
  <label for="fname">New first name:</label>
  <input type="text" name="fname" class="field" required maxlength="20">
  <br>
  <label for="lname">New last name:</label>
  <input type="text" name="lname" class="field" required maxlength="20">
  <input type="submit" name="submit" value="UPDATE" class="form-submit">
</form>

