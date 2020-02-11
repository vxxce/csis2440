<!DOCTYPE html>

<?php

// Map $_POST to variables
extract(array_map('htmlentities', $_POST), EXTR_PREFIX_ALL, "e");

// <--Utils---------------------------

// Subtracts random days, hours, and minutes from datetime object
// and returns formatted datetime string e.g. 'Jan 04 03:41am'.
$makeRecentDate = function ($date): string {
  return $date
    ->sub(new DateInterval('P' . rand(0, 3) . 'DT' . rand(1, 11) . 'H' . rand(1, 59) . 'M'))
    ->format("M d g:ia");
};

// ------------------------------------>

// <--Variables for captain ------------

$pronouns = $e_gender == "male"
  ? ["direct" => "he", "reference" => "his"]
  : ["direct" => "she", "reference" => "her"];
$e_name = ucfirst($e_firstname) . " " . ucfirst($e_lastname);
$handle = "@" . preg_replace("/\W/", "", $e_name);

$hFile = fopen("history.txt", "r") or die("Error");
$historyArr = explode("\n", fread($hFile, filesize("history.txt")));
shuffle($historyArr);
fclose($hFile);

$tFile = fopen("transmissions.txt", "r") or die("Error");
$transmissionsArr = explode("\n", fread($tFile, filesize("transmissions.txt")));
shuffle($transmissionsArr);
fclose($tFile);

$date = new DateTime();
$recentDates = [];
for ($i = 0; $i < 5; $i++) {
  $recentDates[] = $date
    ->sub(new DateInterval('P' . rand(0, 3) . 'DT' . rand(1, 11) . 'H' . rand(1, 59) . 'M'))
    ->format("M d g:ia");
};


// -------------------------------------->

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Captain Generator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>

<body>
  <?php require("../../headerNav.php"); ?>
  <main>
    <h2>Captain Generator</h2>
    <div class='hr'></div>
    <div id="captain-wrapper">
      <div class="profile">

        <?php

        echo <<<EOT
        <h3>$e_name</h3>
        <hr>
        <h4>The Early Years:</h4>
        <p>
        Before {$pronouns['direct']} was a Captain, $e_name studied and trained at Starfleet Academy.
        It was here that the Captain began the construction of {$pronouns['reference']} incredible and occasionally bizarre
        legacy (some call it a mythos) that is all-but-guaranteed to occupy a central spot in the story of humananity and
        intergalactic exploration in the New, More-New, and Even-Newer Millenia.
        </p>
        <p>
          Captain $e_name's time at the academy proved formative. It is often noted that {$pronouns['direct']} $historyArr[0] It's also true that the Captain $historyArr[1]
          Perhaps unsurprisingly, $e_name $historyArr[2]
        </p>
        </div>
EOT;

        echo <<<EOT
        <div class="transmissions">
          <h2>uniTWEET Transmissions</h2>
          <h3>$e_name</h3>
          <span><strong>Public UUID: </strong><em>::3b0d0be8::</em></span>
          <hr>
          <ul>
            <li class="date">
              $recentDates[0]
            </li>
            <li>
              <strong>$handle: </strong><span class="tweet">"$transmissionsArr[0]"</span>
            </li>
            <li class="date">
              $recentDates[1]
            </li>
            <li>
              <strong>$handle: </strong><span class="tweet">"$transmissionsArr[1]"</span>
            </li>
            <li class="date">
              $recentDates[2]
            </li>
            <li>
              <strong>$handle: </strong><span class="tweet">"$transmissionsArr[2]"</span>
            </li>
            <li class="date">
              $recentDates[3]
            </li>
            <li>
              <strong>$handle: </strong><span class="tweet">"$transmissionsArr[3]"</span>
            </li>
            <li class="date">
              $recentDates[4]
            </li>
            <li>
              <strong>$handle: </strong><span class="tweet">"$transmissionsArr[4]"</span>
            </li>
          </ul>
        </div>
EOT;

        ?>

      </div>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
