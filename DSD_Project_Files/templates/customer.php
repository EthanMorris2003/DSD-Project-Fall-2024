<?php
$db_server = "localhost";
$db_user = "ekidd7";
$db_pass = "k8QJ6eko";
$db_name = "ekidd7";

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
    $sql_ins = "INSERT INTO Customer (CustomerID, Username, Password,
            Address, CredCar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_ins);
    $stmt->bind_param("dsssd", $ID, $username, $password, $Address, $credit);

    if ($stmt->execute()) {
        echo "New user was added successfully";
        } else {
            echo "Unable to add new user";
        }
        $stmt->close();

    $conn->close();
}

