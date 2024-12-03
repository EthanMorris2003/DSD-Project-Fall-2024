<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ArmoredStallion";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Unable to connect". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get the data from form
    $ID = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $Address = $_POST["address"];
    $credit = $_POST["creditcard"];

    //Insertion
    $sql_ins = "INSERT INTO Customer (CustomerID, FirstName, LastName,
            Address, CreditCard) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_ins);
    $stmt->bind_param("dsssd", $ID, $FirstName, $LastName, $Address, $credit);

    if ($stmt->execute()) {
        echo "New user was added successfully";
        } else {
            echo "Unable to add new user";
        }
        $stmt->close();

        $conn->close();
}

?>