<h2>Add a new player</h2>
<form id="addForm" action="results.php" method="POST">
  <div class="form-group">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" class="field" required>
    <div id="fnameError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" class="field" required>
    <div id="lnameError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="field" required>
    <div id="emailError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" class="field" required>
    <div id="phoneError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="field" required>
    <div id="passwordError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="confirm">Confirm Password:</label>
    <input type="password" id="confirm" name="confirm" class="field" required>
    <div id="confirmError" class="error"></div>
  </div>
  <input type="submit" name="submit" value="add" onclick="return isValidAdd()">
</form>