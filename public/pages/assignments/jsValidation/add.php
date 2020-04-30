<h2>Add a new player</h2>
<form action="results.php" method="POST">
  <label for="fname">First name:</label>
  <input type="text" name="fname" class="field" required>
  <br>
  <label for="lname">Last name:</label>
  <input type="text" name="lname" class="field" required maxlength="20">
  <br>
  <label for="email">Email:</label>
  <input type="email" name="email" class="field" required maxlength="50">
  <br>
  <label for="phone">Phone:</label>
  <input type="tel" name="phone" class="field" placeholder="##########" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" class="field" required>
  <br>
  <label for="confirm">Confirm Password:</label>
  <input type="password" name="confirm" class="field" required>
  <input type="submit" name="submit" value="add" class="form-submit">
</form>