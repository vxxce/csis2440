<h2>Add a new player</h2>
<form action="results.php" method="POST">
  <label for="fname">First name:</label>
  <input type="text" name="fname">
  <br>
  <label for="lname">Last name:</label>
  <input type="text" name="lname">
  <br>
  <label for="email">Email:</label>
  <input type="email" name="email">
  <br>
  <label for="birthdate">Birthdate:</label>
  <input type="date" name="birthdate" placeholder="MM-DD-YYYY">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password">
  <br>
  <label for="password-confirmation">Confirm Password:</label>
  <input type="password" name="password-confirmation">
  <input type="submit" name="submit" value="ADD">
</form>

