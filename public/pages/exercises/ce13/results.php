<?php
$nums = htmlentities(strip_tags($_GET['num']));
$nums = preg_match("/^[0-9]+$/", $nums) ? (int)$nums : null; 

if ($nums >= 1000001) $divs = "<p>That's too many divs guy, cannot handle</p>";
if (!isset($nums)) $divs = "<p>What's this about?</p>";
sleep(7);
for ($i=0; $i < $nums && $i < 1000001; $i++) {
  echo "<div style='background-color: rgb(" . rand(0,255) . ", " . rand(0,255). ", " . rand(0,255) . ")'></div>";
};
