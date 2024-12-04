<?php

include "database.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
</head>
<body>
    <h1>Customer List</h1>
    <table border="1">
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        {% for customer in customers %}
        <tr>
            <td>{{ customer['customer_id'] }}</td>
            <td>{{ customer['first_name'] }}</td>
            <td>{{ customer['last_name'] }}</td>
            <td>{{ customer['email'] }}</td>
        </tr>
        {% endfor %}
    </table>

    <h2>Add New Customer</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <button type="submit">Add Customer</button>
    </form>
</body>
</html>


<?php

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

?>