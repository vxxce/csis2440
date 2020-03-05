<?php
//write the search statment
try {
    $searchQuery = $pdo->prepare("SELECT * FROM planets WHERE `name`=? or x_coord=? and y_coord=? and z_coord=? or faction=?");
    $searchQuery->execute([$e_name, $e_x_coord, $e_y_coord, $e_z_coord, $e_faction]);
    $searchRes = $searchQuery->fetchAll(PDO::FETCH_ASSOC);
    if (count($searchRes) >= 1) {
        foreach ($searchRes as $planet) {
            print "<hr>";
            print "<strong>" . $planet['name'] . "</strong><hr>";
            print $planet['description'] . "<br>";
            print "Coordinates: (x: " . $planet['x_coord'] . ", y: " . $planet['y_coord'] . ", z: " . $planet['z_coord'] . ")<br>";
            print "Faction: " . $planet['faction'];
        }
    } else {
        print "<p>No planets found with the provided name, coordinates, or faction found</p>";
    }
} catch (\PDOException $e) {
    throw new PDOException("Error searching the database");
}
