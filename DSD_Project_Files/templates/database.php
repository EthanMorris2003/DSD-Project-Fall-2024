<?php
/*
    $db_server = "localhost";
    $db_user = "ekidd7"; //Change to your user
    $db_pass = "k8QJ6eko"; //Change to your password
    $db_name = "ekidd7"; //Change to your db
        $conn = "";
    */

    $db_server = "localhost";
    $db_user = "root"; //Change to your user
    $db_pass = ""; //Change to your password
    $db_name = "armoredstallion"; //Change to your db
    $conn = "";

    //Establish connection to database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if($conn) { //If connection works
        echo "You are successfully connected RRRRRRAAAAAAHHHHHHH!!!!!!!!!";
    } else {
        echo "Unable to connect 0_0";
    }
    