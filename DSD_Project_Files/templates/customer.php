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
    $FirstName = $_POST["firstname"];
    $LastName = $_POST["lastname"];
    $Address = $_POST["address"];
    $credit = $_POST["creditcard"];

    //Insertion
    $sql = "INSERT INTO Customer (CustomerID, FirstName, LastName,
            Address, CreditCard) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsssd", $ID, $FirstName, $LastName, $Address, $credit);
}

?>