<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "2020";

    $conn = mysqli_connect( $server, $user, $password, $database);

    if(!$conn){
        die("Something went wrong");
    }
?>