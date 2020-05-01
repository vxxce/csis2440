<h2>Update a player's name</h2>
<form id="updateForm" action="results.php" method="POST">
  <p><i>You must know the player's email and password to update their information.</i></p>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="field">
    <div id="emailError" class="error"></div>
  </div>
  <div class='form-group'>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="field">
    <div id="passwordError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="fname">New first name:</label>
    <input type="text" id="fname" name="fname" class="field">
    <div id="fnameError" class="error"></div>
  </div>
  <div class="form-group">
    <label for="lname">New last name:</label>
    <input type="text" id="lname" name="lname" class="field">
    <div id="lnameError" class="error"></div>
  </div>
  <input type="submit" name="submit" value="UPDATE" class="form-submit" onclick="return isValidUpdate()">
</form>