<?php

try {
    $searchQuery = $pdo->prepare("INSERT INTO planets (`name`, x_coord, y_coord, z_coord, faction, description) values (?, ?, ?, ?, ?, ?)");
    $searchQuery->execute([$e_name, $e_x_coord, $e_y_coord, $e_z_coord, $e_faction, $e_description])
        ? print ucwords($e_name) . " successfully added to the database."
        : print "There was an error adding " . ucwords($e_name) . " to the database";
} catch (\PDOException $e) {
    throw new PDOException("Connection Error");
}
