<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
    $pdo = new PDO($ce08_dsn, $ce08_un, $ce08_pw) or die("Could not connect");
    $prep = $pdo->prepare("SELECT * FROM `ce08`.`captains` WHERE `email`=?");
    $prep->execute([$_POST["email"]]);
    $res = $prep->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    $prep = null;
    if (password_verify($_POST["pass"], $res["pass"])) {
        foreach ($res as $k => $v) $_SESSION[$k] = htmlentities($v);
        header("Location: Dashboard.php");
    } else {
    }
