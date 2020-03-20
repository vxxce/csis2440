<?php

try {
    $searchQuery = $pdo->prepare("SELECT `name` FROM planets where `name`=? LIMIT 1");
    $searchQuery->execute([$e_name]);
    if (count($searchQuery->fetchAll(PDO::FETCH_ASSOC)) == 1) {
        $searchQuery = $pdo->prepare("UPDATE planets SET `description`=? WHERE `name`=?");
        $searchQuery->execute([$e_description, $e_name])
            ? print ucwords($e_name) . " successfully updated."
            : print "There was an error updating " . ucwords($e_name) . "'s description.";
    } else {
        print "That planet is not in the database.";
    }
} catch (\PDOException $e) {
    throw new PDOException("Connection Error");
}
