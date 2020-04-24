<?php

$isValidEmail = function ($email) {
  return preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email);
};

$isValidLength = function ($input, $min = 0, $max = 300) {
  return $min <= strlen($input) && strlen($input) <= $max;
};

$isAlpha = function ($input) {
  return !preg_match("/[^a-zA-Z]/", $input);
};

$isNumeric = function ($input) {
  return !preg_match("/[^\d]/", $input);
};

$meetsPasswordRequirements = function ($input, $passwordRegEx) {
  return preg_match($passwordRegEx, $input);
};
