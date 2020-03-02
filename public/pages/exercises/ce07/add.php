<?php
//write your insert statment
$insert;
//echo $insert;
$success = $con->query($insert);

if ($success == FALSE) {
    //error if query did not run
} else {
    //let them know it was added
}
