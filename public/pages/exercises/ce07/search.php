<?php
//write the search statment
$search;
$return = $con->query($search);

if (!$return) {
    $message = "Whole query " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
echo "<table><th>Name</th><th width='10%'>X,Y,Z</th><th>Description</th><th>Faction</th>"
 . "<th>Station</th>";
while ($row = $return->fetch_assoc()) {
    //print out a table row with the data in it
}
echo "</table>";
