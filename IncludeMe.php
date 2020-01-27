<?php

// function to print distance 
function PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2)
{
  $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2) + pow($z2 - $z1, 2) * 1.0);
  return $dist;
}

$planets = [
  ["name" => "Ares",          "x" => 335, "y" => 345, "z" => 262],
  ["name" => "Ariel",         "x" => 105, "y" => 276, "z" => 393],
  ["name" => "Beaumonde",     "x" => 274, "y" => 596, "z" => 254],
  ["name" => "Bellerophon",   "x" => 704, "y" =>  73, "z" =>   2],
  ["name" => "Haven",         "x" => 619, "y" => 246, "z" => 325],
  ["name" => "Hera",          "x" => 870, "y" => 900, "z" => 706],
  ["name" => "Higgins' Moon", "x" =>  76, "y" => 569, "z" => 354],
  ["name" => "Jiangyin",      "x" => 293, "y" => 983, "z" =>  37],
  ["name" => "Lilac",         "x" => 578, "y" => 521, "z" => 341],
  ["name" => "Miranda",       "x" => 419, "y" => 257, "z" => 171],
  ["name" => "Osiris",        "x" => 797, "y" => 472, "z" => 279],
  ["name" => "Persephone",    "x" => 283, "y" => 141, "z" => 712],
  ["name" => "Regina",        "x" => 412, "y" => 671, "z" =>  25],
  ["name" => "Santo",         "x" => 852, "y" => 492, "z" => 876],
  ["name" => "St. Albans",    "x" => 258, "y" => 485, "z" =>  95],
  ["name" => "Triumph",       "x" =>  93, "y" => 905, "z" => 132],
  ["name" => "Whitefall",     "x" => 146, "y" => 543, "z" => 718]
];

$ships = [
  ["name" => "Crate",        "speed" => 1.8],
  ["name" => "Lightening",   "speed" => 4.3],
  ["name" => "Starliner",    "speed" => 2.4],
  ["name" => "VD Tug",       "speed" => 1.4],
  ["name" => "Biel-Corp II", "speed" => 1.3],
  ["name" => "VD Behemoth",  "speed" => 0.5]
];
