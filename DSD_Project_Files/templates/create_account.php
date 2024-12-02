<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include '../auth/config.inc';
// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
//run a query to get all department names  
$sqlstatement = $conn->prepare("SELECT distinct dept_name FROM department order by dept_name asc"); //prepare the statement
$sqlstatement->execute(); //execute the query
$departments = $sqlstatement->get_result(); //return the results we'll use them in the web form
$sqlstatement->close();

function displayFaculty() {
  global $conn; //reference the global connection object (scope)
  $sql = "SELECT * FROM instructor";
        $result = $conn->query($sql);

     if ($result->num_rows > 0) {
        // Setup the table and headers
        echo "<Center><table><tr><th>ID</th><th>Name</th><th>Department</th><th>Salary</th></tr>";
       // output data of each row into a table row
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>".$row["ID"]."</td><td>".$row["name"]."</td><td> ".$row["dept_name"]."</td><td>$".$row["salary"]."</td></tr>";
           }
      echo "</table></center>"; // close the table
      echo "There are ". $result->num_rows . " results.";
     // Don't render the table if no results found
    } else {
      echo "0 results";
                                                                                                                      }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Horse - The Armored Stallion</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Cinzel', serif;
            background-color: #ffffff;
            color: #373737;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #292929;
            color: #ffffff;
            text-align: center;
            padding: 1.5rem 0;
        }

        header h1 {
            font-family: 'MedievalSharp', serif;
            font-size: 2rem;
            letter-spacing: 2px;
            margin: 0;
        }

        main {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        form {
            background-color: #f8f8f8;
            border: 2px solid #6c6c6c;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        form h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        label {
            display: block;
            font-size: 1rem;
            margin: 1rem 0 0.5rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-button {
            display: inline-block;
            width: 100%;
            padding: 0.8rem 1.2rem;
            background-color: #6c6c6c;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-family: 'Cinzel', serif;
            font-size: 1rem;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid #ffffff;
        }

        .submit-button:hover {
            background-color: #292929;
        }

        footer {
            background-color: #292929;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>The Armored Stallion - Purchase Horse</h1>
    </header>

    <main>
        <form action="confirmation.html" method="POST">
            <h2>Complete Your Purchase</h2>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="address">Shipping Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>

            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment" required>
                <option value="">Select a payment method</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>

            <button type="submit" class="submit-button">Place Order</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 The Armored Stallion</p>
    </footer>


    <?php //starting php code again!
if (!isset($_GET["form_submitted"]))
{
		echo "Hello. Please enter new faculty information and submit the form.";
    echo "<p>Here is a list of the current faculty members:";
    displayFaculty();
}
else {
  if (!empty($_GET["name"]) && !empty($_GET["id"]) && !empty($_GET["salary"]))
{
   $profName = $_GET["name"]; //gets name from the form
   $profID = $_GET["id"]; //gets id from the form
   $profDept = $_GET["department"]; //get department from the form
   $profSalary = $_GET["salary"]; //get salary from the form
   $sqlstatement = $conn->prepare("INSERT INTO instructor values(?, ?, ?, ?)"); //prepare the statement
   $sqlstatement->bind_param("sssd",$profID,$profName,$profDept,$profSalary); //insert the variables into the ? in the above statement
   $sqlstatement->execute(); //execute the query
   echo $sqlstatement->error; //print an error if the query fails
   $sqlstatement->close();
 }
 else {
	 echo "<b> Error: Please enter a name, an ID number and a salary to proceed.</b>";
 }
 
   echo "<p>Here is a list of the current faculty members:";
   displayFaculty();
   $conn->close();
 } //end else condition where form is submitted
  ?> <!-- this is the end of our php code -->
</body>
</html>