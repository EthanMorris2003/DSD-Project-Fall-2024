<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "ArmoredStallion";
    $conn = "";

    //Establish connection to database
    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception) {
        echo "Could not connect 0_0";
    }
    if($conn) { //If connection works
        echo "You are successfully connected RRRRRRAAAAAAHHHHHHH!!!!!!!!!";
    }

    /*
    //Establish connection to database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if($conn) { //If connection works
        echo "You are successfully connected RRRRRRAAAAAAHHHHHHH!!!!!!!!!";
    } else {
        echo "Unable to connect 0_0";
    }
    */