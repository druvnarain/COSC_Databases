<?php 

function createDB() {
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="ronainsurance";

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    return $connection;
}

?>