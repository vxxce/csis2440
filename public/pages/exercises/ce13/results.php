<?php
$divs = "";
for ($i=0; $i < $_GET['num'] && $i < 100000; $i++) {
  $divs .= "<div style='background-color: rgb(" . rand(0,255) . ", " . rand(0,255). ", " . rand(0,255) . ")'></div>";
};
echo $divs;
