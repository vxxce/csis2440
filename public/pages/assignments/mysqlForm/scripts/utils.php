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

$anyInvalidChars = function (array $assocArray, string $regExInvalidChars) {
  /**
   * Check for invalid characters 
   * @param Array $assocArray
   * @param String $regExInvalidCharacters
   * @return Array Array with which fields contained invalid characters.
   **/
  $invalidFields = [];
  foreach ($assocArray as $k => $v) {
    if (preg_match($regExInvalidChars, $v) === 1) $invalidFields[] = $k;
  }
  return $invalidFields;
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

$formatDate = function (string $date) {
  /**
   * Formats a date to YYYY-MM-DD.
   * Input Requirements:
   *   - Has year, month, and day.
   *   - Year, month, and day separated by an non-numerical value (e.g. 01/01/1998, 2000-1-2)
   *   - Year must be four characters or, if two characters, between 1932 and 1999 (e.g. 68, 1990, 2010)
   *   - Month must precede day (e.g. M-D-YY, M-DD-YYYY, YY-M-D)
   * 
   * @param String $date
   * @return String|Null Date string in format YYYY-MM-DD. Null if date not interpretable.
   **/
  $splitDate = preg_split("/[^0-9]/", $date);
  $formattedYMD = [];

  foreach ($splitDate as $k => $v) {
    if (intval($v) > 32) {
      $formattedYMD[0] = str_pad($v, 4, "19", STR_PAD_LEFT);
      unset($splitDate[$k]);
    } else if (intval($v) > 12 && intval($v) < 32) {
      $formattedYMD[2] = $v;
      unset($splitDate[$k]);
    }
  }

  if (!$formattedYMD[0]) {
    return;
  } else if ($formattedYMD[0] && $formattedYMD[2]) {
    $formattedYMD[1] = str_pad($splitDate[array_keys($splitDate)[0]], 2, "0", STR_PAD_LEFT);
  } else {
    $formattedYMD[1] = str_pad($splitDate[array_keys($splitDate)[0]], 2, "0", STR_PAD_LEFT);
    $formattedYMD[2] = str_pad($splitDate[array_keys($splitDate)[1]], 2, "0", STR_PAD_LEFT);
  }
  ksort($formattedYMD);

  return implode("-", $formattedYMD);
};

// Toggle view of active elements
$active = function (string $buttonType, string $queryType) {
  return ($buttonType == $queryType) ? "active" : "inactive";
};
