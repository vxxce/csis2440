<?php

/***** VALIDATION ********** */

$anyEmpty = function (array $assocArray) {
  /**
   * Check for empty required fields
   * @param Array $assocArray
   * @return Array Array with which required fields were empty
   **/
  $emptyFields = [];
  foreach ($assocArray as $k => $v) {
    if (empty($v)) $emptyFields[] = $k;
  }
  return $emptyFields;
};

$maxLengthViolation = function (string $input, int $maxLength, int $minLength = 0) {
  /**
   * Check length requirements
   * @param String $input
   * @param Integer $maxLength
   * @param Integer $minLength
   * @return Boolean True if length conditions met, false otherwise.
   **/
  return ($input > $maxLength && $input < $minLength);
};

// Toggle view of active elements
$active = function (string $buttonType, string $queryType) {
  return ($buttonType == $queryType) ? "active" : "inactive";
};
