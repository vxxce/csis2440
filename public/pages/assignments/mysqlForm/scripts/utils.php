<?php

/***** VALIDATION ********** */

// Check for empty required fields
$anyEmpty = function (array $assocArray) {
  $emptyFields = [];
  foreach ($assocArray as $k => $v) {
    if (empty($v)) $emptyFields[] = $k;
  }
  return $emptyFields;
};

// Check for invalid characters
$anyInvalidChars = function (array $assocArray, string $regEx) {
  $invalidFields = [];
  foreach ($assocArray as $k => $v) {
    if (preg_match($regEx, $v) === 1) $invalidFields[] = $k;
  }
  return $invalidFields;
};

// Check length requirements
$maxLengthViolation = function (string $input, int $maxLength, int $minLength=0) {
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
    $formattedYMD[1] = str_pad($splitDate[array_key_first($splitDate)], 2, "0", STR_PAD_LEFT );
  } else {
    $formattedYMD[1] = str_pad($splitDate[array_key_first($splitDate)], 2, "0", STR_PAD_LEFT );
    $formattedYMD[2] = str_pad($splitDate[array_key_last($splitDate)], 2, "0", STR_PAD_LEFT );
  }
  ksort($formattedYMD);
  return implode("-", $formattedYMD);
};

// Toggle view of active elements
$active = function (string $buttonType, string $queryType) {
  return ($buttonType == $queryType) ? "active" : "inactive";
};
