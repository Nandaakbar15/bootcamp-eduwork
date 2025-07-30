<?php 

$connect = mysqli_connect("localhost", "root", "", "latihandb");

if(!$connect) {
    exit("Failed to connect the database!");
}

?>