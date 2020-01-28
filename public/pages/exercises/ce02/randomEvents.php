<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CE-02: Random Events</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
</head>

<body>
  <main>
    <h2>10-round random score game</h2>
    <p><em>It's... kind of a game?</em></p>
    <p>
      <?php
      $score = 0;
      echo "<table>\n<thead><tr><th>Player</th><th>Computer</th><th>Rounds</th></tr></thead>\n<tbody>\n";
      for ($i = 0; $i < 10; $i++) {
        $playerScore = rand(0, 100);
        $compScore = rand(0, 100);
        if ($playerScore - $compScore > 0) {
          $score++;
          echo "<tr><td>$playerScore</td><td>$compScore</td><td>Player wins round.</td></tr>\n";
        } elseif ($playerScore - $compScore < 0) {
          $score--;
          echo "<tr><td>$playerScore</td><td>$compScore</td><td>Computer wins round.</td></tr>\n";
        } else {
          echo "<tr><td>$playerScore</td><td>$compScore</td><td>Tie!</td></tr>\n";
        }
      }
      echo "</tbody>\n</table>\n";
      echo $score >= 1 ? "<p>Player wins with the final score of: $score</p>" : "<p>Player loses with final score of: $score</p>";
      echo "<hr />";

      //Year of the---
      echo "<h1>Chinese Zodiac</h1>";
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

      <label for='year'>Try some other year: </label>
      <input name='year' id='year' type='text' placeholder='Enter a year' max-length='4' />
      <button id='checkYear' type='submit'>Check</button>
      <p id='answer'></p>
  </main>
  <script src="/assets/js/chineseZodiac.js" type="text/javascript"></script>
</body>

</html>