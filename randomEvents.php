<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Zachary Olpin - Random Events</title>
</head>
<body>
  <?php

    $score = 0;
    // Choose random n between 0 and 10. If n > 5, increment score by 1, else decrement score by 1.
    // Loop 10 times and then echo final score.
    for ($i=0; $i<10; $i++) {
      $n = rand(0, 10);
      $n > 5 ? $score++ : $score-- ;
    }
    echo "<h1>$score</h1>"

  ?>
</body>
</html>