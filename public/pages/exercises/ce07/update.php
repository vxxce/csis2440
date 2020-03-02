<?php

$update;//write the update statment
if ($desc != "A short description of the planet") {
    $update .= "";//add the description
}
$update .= "";//add the where clause
$success = $con->query($update);
if ($success == FALSE) {
    //error if query did not run
} else {
    //let user know it worked
}
