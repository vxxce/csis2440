<?php

 // Connect to db
 require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
 require_once "scripts/utils.php";
 $pdo = new PDO($mysql_dsn, $mysql_un, $mysql_pw);

switch ($_POST["submit"]) {
  case "ADD":
    require_once "scripts/submitAdd.php";
    break;
  case "UPDATE":
    require_once "scripts/submitUpdate.php";
    break;
  case "SEARCH":
    require_once "scripts/submitSearch.php";
    break;
  default:
    break;
}

if ($errorHeader) print $errorHeader;
