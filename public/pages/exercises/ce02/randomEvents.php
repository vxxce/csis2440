<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Random Events</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
    <h2>10-round random score game</h2>
    <div class='hr'></div>
    <section>
      <?php
      $score = 0;
      echo "<div id='randomGame'>
              <table>
                <thead>
                  <tr><th></th><th>Player</th><th>Computer</th><th>Result</th></tr>
                </thead>
                <tbody>";
      for ($i = 1; $i < 11; $i++) {
        $playerScore = rand(0, 100);
        $compScore = rand(0, 100);
        if ($playerScore - $compScore > 0) {
          $score++;
          echo "<tr><th>Round " . $i . "</th><td>$playerScore</td><td>$compScore</td><td>Player wins!</td></tr>\n";
        } elseif ($playerScore - $compScore < 0) {
          $score--;
          echo "<tr><th>Round " . $i . "</th><td>$playerScore</td><td>$compScore</td><td>Computer wins!</td></tr>\n";
        } else {
          echo "<tr><th>Round " . $i . "</th><td>$playerScore</td><td>$compScore</td><td>Tie!</td></tr>\n";
        }
      }
      echo "</tbody></table>";
      echo $score >= 1
        ? "<p><strong>Player wins with the final score of: $score</strong></p>"
        : "<p><strong>Player loses with final score of: $score</strong></p>";
      echo "<input id='reload' type='submit' value='PLAY AGAIN'/ >";
      echo "</div>";

      // Chinese Zodiac
      echo "<h2>Chinese Zodiac</h2>";
      echo "<div class='hr'></div>";
      $year = date("Y");
      echo "<p>It is the presently the year of the: <em>";
      switch ($year % 12) {
        case 0:
          echo "Monkey";
          break;
        case 1:
          echo "Rooster";
          break;
        case 2:
          echo "Dog";
          break;
        case 3:
          echo "Boar";
          break;
        case 4:
          echo "Rat";
          break;
        case 5:
          echo "Ox";
          break;
        case 6:
          echo "Tiger";
          break;
        case 7:
          echo "Rabbit";
          break;
        case 8:
          echo "Dragon";
          break;
        case 9:
          echo "Snake";
          break;
        case 10:
          echo "Horse";
          break;
        case 11:
          echo "Lamb";
          break;
        default:
          break;
      }
      echo "</em></p>";
      ?>
    </section>
    <section>
      <label for='year'>Try some other year: </label>
      <input name='year' id='year' type='text' placeholder='Enter a year' max-length='4' />
      <p>
        <button id='checkYear' type='submit'>Check</button>
        <p id='answer'></p>
    </section>
  </main>
  <script src="/assets/js/chineseZodiac.js" type="application/javascript"></script>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>