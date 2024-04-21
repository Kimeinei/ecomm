<?php

    //CREATE A CONNECTION TO THE DATABASE
    $connection = mysqli_connect("localhost:4306", "root", "", "pabakal_db");

    if(!$connection){
        die("Could not connect".mysqli_connect_error());
    }else
        echo("CONNECTION ESTABLISHED!");
?>