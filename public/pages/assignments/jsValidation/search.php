<h2>Search for a player by name</h2>
<p><i>You may search by first or last name, or both.</i></p>
<form id="searchForm" action="results.php" method="POST">
  <div class="form-group">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" class="field">
  </div>
  <div class="form-group">
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" class="field">
    <div id="namesError" class="error"></div>
  </div>
  <input type="submit" name="submit" value="SEARCH" class="form-submit" onclick="return isValidSearch()">
</form>