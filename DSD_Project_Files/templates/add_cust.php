<?php
    include "database.php";
    
    //Insert data into customer table
    $sql_ins = "INSERT INTO Customer (CustomerID, FirstName,
                LastName, Address, CreditCardNumber) 
                VALUES (1, 'John', 'Doe', '123 Squire Blvd',
                '411111111'";
    try {
        mysqli_query($conn, $sql_ins);
    }
    catch(mysqli_sql_exception) {
        echo "Could not insert into database";
    }
    
