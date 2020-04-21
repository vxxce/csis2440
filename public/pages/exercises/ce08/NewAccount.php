<?php
session_start();

if (isset($_SESSION['email'])) header("Location: Dashboard.php");
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>New Account</title>
        <?php
        if (isset($_POST['submit'])) {
            // New account form submitted

            // TODO: PHP Validation
            // TODO: Sanitize input


            require_once $_SERVER["DOCUMENT_ROOT"] . "/../private/conn.php";
            $pdo = new PDO($ce08_dsn, $ce08_un, $ce08_pw) or die("Could not connect");
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['confirm-password'];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            // Insert into DB
            $query = $pdo->prepare(
                "INSERT INTO ce08.captains (`name`, email, command, combat, commerce, cunning, pass)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $res = $query->execute([$name, $email, rand(25,100), rand(25, 100), rand(25, 100), rand(25, 100), $hash]);
            if ($res == true) {
                $_SESSION["newUser"] = $email;
                header("Location: Login.php");
            }
        } else {
            // No new account submission yet, show form.
            print <<<HTML
                <form action="NewAccount.php" method="POST">
                    <label for="name">Captain Name</label>  
                    <input id="name" name="name" type="text" required>
                    <br>
                    <label for="email">Email</label>  
                    <input id="email" name="email" type="email" placeholder="you@example.com" required>
                    <br>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                    <br>
                    <label for="confirm-password">Password</label>
                    <input id="conofirm-password" name="confirm-password" type="password" required>
                    <br>  
                    <input id="submit" name="submit" type="submit">
                </form>
HTML;
        }
