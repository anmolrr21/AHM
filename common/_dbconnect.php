<?php
    //connecting to db
    $servername = "localhost:3307";
    //$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ahm";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("Sorry! Cannot connect to database right now");
    }

?>
